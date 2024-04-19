const { src, dest, watch, series, parallel } = require("gulp");
const clean = require("gulp-clean"); //For Cleaning build/dist for fresh export
const options = require("./config"); //paths and other options from config.js
const browserSync = require("browser-sync").create();
const named = require("vinyl-named");
const sass = require("gulp-sass")(require("sass")); //For Compiling SASS files
const postcss = require("gulp-postcss"); //For Compiling tailwind utilities with tailwind config
const concat = require("gulp-concat"); //For Concatinating js,css files
const uglify = require("gulp-terser"); //To Minify JS files
const imagemin = require("gulp-imagemin"); //To Optimize Images
const mozjpeg = require("imagemin-mozjpeg"); // imagemin plugin
const pngquant = require("imagemin-pngquant"); // imagemin plugin
const logSymbols = require("log-symbols"); //For Symbolic Console logs :) :P
const includePartials = require("gulp-file-include"); //For supporting partials if required
const webpack = require("webpack-stream");

//Load Previews on Browser on dev
function livePreview(done) {
    browserSync.init({
        server: {
            baseDir: options.paths.build.base,
        },
        port: options.config.port || 5000,
    });
    done();
}

// Triggers Browser reload
function previewReload(done) {
    console.log("\n\t" + logSymbols.info, "Reloading Browser Preview.\n");
    browserSync.reload();
    done();
}

//Development Tasks
function devHTML() {
    return src(`${options.paths.src.base}/**/*.html`)
        .pipe(includePartials())
        .pipe(dest(options.paths.build.base));
}

function devStyles() {
    const tailwindcss = require("tailwindcss");
    const autoprefixer = require("autoprefixer");
    return src(`${options.paths.src.scss}/style.scss`)
        .pipe(sass().on("error", sass.logError))
        .pipe(postcss([tailwindcss(options.config.tailwindjs), autoprefixer()]))
        .pipe(concat({ path: "style.css" }))
        .pipe(dest(options.paths.src.css))
        .pipe(dest(options.paths.build.css));
}

function devScripts() {
    return src(`${options.paths.src.es}/app.js`)
        .pipe(
            webpack({
                mode: "development",
                output: {
                    filename: "app.min.js",
                },
            })
        )
        .pipe(dest(options.paths.src.js))
        .pipe(dest(options.paths.build.js));
}

function devPagesScripts() {
    return src(`${options.paths.src.es}/pages/**/*.js`)
        .pipe(named())
        .pipe(
            webpack({
                mode: "development",
            })
        )
        .pipe(dest(options.paths.src.js + "/pages"))
        .pipe(dest(options.paths.build.js + "/pages"));
}

function devVendorScripts() {
    return src(
        options.coreVendorsFiles.js.map(
            (file) => `${options.paths.src.vendors}/${file}`
        )
    )
	.pipe(concat("vendors" + ".min.js"))
	.pipe(dest(options.paths.src.js))
	.pipe(dest(options.paths.build.js));
}

function devCopyVendorScripts() {
    return src(options.paths.src.vendors + '/**/*')
	.pipe(dest(options.paths.build.vendors));
}

function devImages() {
    return src(`${options.paths.src.img}/**/*`).pipe(
        dest(options.paths.build.img)
    );
}

function devFonts() {
    return src(`${options.paths.src.fonts}/**/*`).pipe(
        dest(options.paths.build.fonts)
    );
}

function watchFiles() {
    watch(
        `${options.paths.src.base}/**/*.{html,php}`,
        series(devHTML, devStyles, previewReload)
    );
    watch(
        [options.config.tailwindjs, `${options.paths.src.scss}/**/*.scss`],
        series(devStyles, previewReload)
    );
    watch(
        `${options.paths.src.es}/**/*.js`,
        series(devScripts, devPagesScripts, previewReload)
    );
    watch(`${options.paths.src.img}/**/*`, series(devImages, previewReload));
    watch(`${options.paths.src.fonts}/**/*`, series(devFonts, previewReload));
    console.log("\n\t" + logSymbols.info, "Watching for Changes..\n");
}

function devClean() {
    console.log(
        "\n\t" + logSymbols.info,
        "Cleaning dist folder for fresh start.\n"
    );
    return src(options.paths.build.base, {
        read: false,
        allowEmpty: true,
    }).pipe(clean());
}

//Production Tasks (Optimized Build for Live/Production Sites)
function prodHTML() {
    return src(`${options.paths.src.base}/**/*.{html,php}`)
        .pipe(includePartials())
        .pipe(dest(options.paths.dist.base));
}

function prodStyles() {
    const tailwindcss = require("tailwindcss");
    const autoprefixer = require("autoprefixer");
    const cssnano = require("cssnano");
    return src(`${options.paths.src.scss}/style.scss`)
        .pipe(sass().on("error", sass.logError))
        .pipe(
            postcss([
                tailwindcss(options.config.tailwindjs),
                autoprefixer(),
                cssnano(),
            ])
        )
        .pipe(dest(options.paths.dist.css));
}

function prodScripts() {
    return src(`${options.paths.src.es}/app.js`)
        .pipe(
            webpack({
                mode: "production",
                output: {
                    filename: "app.min.js",
                },
            })
        )
        .pipe(dest(options.paths.src.js))
        .pipe(uglify())
        .pipe(dest(options.paths.dist.js));
}

function prodPagesScripts() {
    return src(`${options.paths.src.es}/pages/**/*.js`)
        .pipe(named())
        .pipe(
            webpack({
                mode: "production",
            })
        )
        .pipe(dest(options.paths.src.js + "/pages"))
        .pipe(uglify())
        .pipe(dest(options.paths.dist.js + "/pages"));
}

function prodVendorScripts() {
    return src(
        options.coreVendorsFiles.js.map(
            (file) => `${options.paths.src.vendors}/${file}`
        )
    )
        .pipe(concat("vendors" + ".min.js"))
        .pipe(dest(options.paths.src.js))
        .pipe(uglify())
        .pipe(dest(options.paths.dist.js));
}

function prodImages() {
    const pngQuality = Array.isArray(options.config.imagemin.png)
        ? options.config.imagemin.png
        : [0.7, 0.7];
    const jpgQuality = Number.isInteger(options.config.imagemin.jpeg)
        ? options.config.imagemin.jpeg
        : 70;
    const plugins = [
        pngquant({ quality: pngQuality }),
        mozjpeg({ quality: jpgQuality }),
    ];

    return src(options.paths.src.img + "/**/*")
        .pipe(imagemin([...plugins]))
        .pipe(dest(options.paths.dist.img));
}

function prodFonts() {
    return src(`${options.paths.src.fonts}/**/*`).pipe(
        dest(options.paths.dist.fonts)
    );
}

function prodCopyVendorScripts() {
    return src(options.paths.src.vendors + '/**/*')
	.pipe(dest(options.paths.dist.vendors));
}

function prodClean() {
    console.log(
        "\n\t" + logSymbols.info,
        "Cleaning build folder for fresh start.\n"
    );
    return src(options.paths.dist.base, { read: false, allowEmpty: true }).pipe(
        clean()
    );
}

function buildFinish(done) {
    console.log(
        "\n\t" + logSymbols.info,
        `Production build is complete. Files are located at ${options.paths.dist.base}\n`
    );
    done();
}

exports.default = series(
    devClean, // Clean Dist Folder
    parallel(
        devStyles,
        devVendorScripts,
        devScripts,
        devPagesScripts,
        devImages,
        devFonts,
        devHTML
    ), //Run All tasks in parallel
	devCopyVendorScripts, //Copy Vendors Script
    livePreview, // Live Preview Build
    watchFiles // Watch for Live Changes
);

exports.prod = series(
    prodClean, // Clean Build Folder
    parallel(
        prodStyles,
        prodVendorScripts,
        prodScripts,
        prodPagesScripts,
        prodImages,
        prodHTML,
        prodFonts
    ), //Run All tasks in parallel
    prodCopyVendorScripts,
    buildFinish
);

exports.css = series(devStyles);

exports.js = series(devVendorScripts, devScripts, devPagesScripts);
