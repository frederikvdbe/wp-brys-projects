import { defineConfig } from 'vite'
import path from 'path'
import copy from 'rollup-plugin-copy'

const port = 5173;
const origin = `${process.env.DDEV_PRIMARY_URL}:${port}`;

const themeName = 'brys-projects';
const themePath = path.resolve(import.meta.dirname, `web/app/themes/${themeName}`);
const srcPath = path.resolve(import.meta.dirname, 'assets');
const distPath = `${themePath}/assets/dist`;

const fullReloadForTemplates = {
	name: 'full-reload-always',
	handleHotUpdate({ server, file }) {
		if (file.endsWith(".php")){
			server.ws.send({ type: "full-reload" })
			return []
		}
	},
}

// https://vitejs.dev/config/
export default defineConfig({
	build: {
		outDir: distPath,
		emptyOutDir: true,
		rollupOptions: {
			input: {
				scripts: `${srcPath}/js/main.js`,
				styles: `${srcPath}/scss/main.scss`,
			},
		},
	},
	css: {
		devSourcemap: true,
		preprocessorOptions: {
			scss: {
				// Allows `@import "node_modules/..."` paths relative to the project root
				loadPaths: [import.meta.dirname],
				silenceDeprecations: ['import', 'global-builtin', 'slash-div'],
			},
		},
	},
	// Adjust Vites dev server for DDEV
	// https://vitejs.dev/config/server-options.html
	server: {
		// respond to all network requests:
		host: '0.0.0.0',
		port: port,
		strictPort: true,
		// Defines the origin of the generated asset URLs during development
		origin: origin,
		cors: {
			origin: /https?:\/\/([A-Za-z0-9\-\.]+)?(\.ddev\.site)(?::\d+)?$/,
		}
	},

	plugins: [
		fullReloadForTemplates,
		copy({
			targets: [
				{
					src: `${srcPath}/vectors/*`,
					dest: `${themePath}/partials/vectors`,
					rename: name => `${name}.svg.php`
				}, {
					src: `${ srcPath }/images/**/*`,
					dest: `${ distPath }/images`
				}
			],
			verbose: true
		})
	]

})
