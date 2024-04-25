const options = require("./config"); //options from config.js

const allPlugins = {
  typography: require("@tailwindcss/typography"),
  containerQueries: require("@tailwindcss/container-queries"),
};

const plugins = Object.keys(allPlugins)
  .filter((k) => options.twPlugins[k])
  .map((k) => {
    if (k in options.twPlugins && options.twPlugins[k]) {
      return allPlugins[k];
    }
  });

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./src/**/*.{html,js}"],
	darkMode: "class",
	theme: {
		fontFamily: {
			sans: [
				'Inter',
				'ui-sans-serif',
				'system-ui',
				'-apple-system',
				'BlinkMacSystemFont',
				'"Segoe UI"',
				'Roboto',
				'"Helvetica Neue"',
				'Arial',
				'"Noto Sans"',
				'sans-serif',
				'"Apple Color Emoji"',
				'"Segoe UI Emoji"',
				'"Segoe UI Symbol"',
				'"Noto Color Emoji"',
			],
			serif: [
				'ui-serif',
				'Georgia',
				'Cambria',
				'"Times New Roman"',
				'Times',
				'serif',
			],
			mono: [
				'ui-monospace',
				'SFMono-Regular',
				'Menlo',
				'Monaco',
				'Consolas',
				'"Liberation Mono"',
				'"Courier New"',
				'monospace',
			],
		},
		screens: {
			xs: '576',
			sm: '640px',
			md: '768px',
			lg: '1024px',
			xl: '1280px',
			'2xl': '1536px',
		},
		extend: {
			colors: {
				primary: {
					50: 'var(--primary-color-50)',
					100: 'var(--primary-color-100)',
					200: 'var(--primary-color-200)',
					300: 'var(--primary-color-300)',
					400: 'var(--primary-color-400)',
					500: 'var(--primary-color-500)',
					600: 'var(--primary-color-600)',
					700: 'var(--primary-color-700)',
					800: 'var(--primary-color-800)',
					900: 'var(--primary-color-900)',
					950: 'var(--primary-color-950)',
				},
			},
			typography: (theme) => ({
				DEFAULT: {
					css: {
						color: theme('colors.gray.500'),
						maxWidth: '65ch',
					},
				},
				invert: {
					css: {
						color: theme('colors.gray.400'),
					},
				},
			}),
		},
	},
	corePlugins: {
		visibility: false
	},
  	plugins: plugins,
};
