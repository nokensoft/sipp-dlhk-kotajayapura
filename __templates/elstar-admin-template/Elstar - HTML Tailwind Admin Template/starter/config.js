const config = {
    tailwindjs: './tailwind.config.js',
    port: 9050,
    purgecss: {
        content: ['src/**/*.{html,js}'],
        safelist: {
            standard: [/^pre/, /^code/],
            greedy: [/token.*/],
        },
    },
    imagemin: {
        png: [0.7, 0.7], // range between min (0) and max (1) as quality - 70% with current values for png images,
        jpeg: 70, // % of compression for jpg, jpeg images
    },
};

// tailwind plugins
const twPlugins = {
    typography: true,
    forms: true,
    containerQueries: true,
};

const coreVendorsFiles = {
    js: [
        'jquery/jquery.min.js',
        'bootstrap/js/bootstrap.bundle.min.js',
        'perfect-scrollbar/js/perfect-scrollbar.min.js',
        // Dependencies for Demo
        'prism/prism.js',
    ],
    css: [],
};

// base folder paths
const basePaths = ['src', 'dist', 'build'];

// folder assets paths
const folders = ['css', 'scss', 'es', 'js', 'img', 'fonts', 'vendors'];

const paths = {
    root: '',
};

basePaths.forEach((base) => {
    paths[base] = {
        base: `${base}`,
    };
    folders.forEach((folderName) => {
        const toCamelCase = folderName.replace(/\b-([a-z])/g, (_, c) =>
            c.toUpperCase()
        );
        paths[base][toCamelCase] = `./${base}/${folderName}`;
    });
});

module.exports = {
    config,
    twPlugins,
    paths,
    coreVendorsFiles,
};
