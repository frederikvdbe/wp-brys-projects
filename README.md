# Brys Projects

WordPress site built on [Bedrock](https://roots.io/bedrock/). PHP dependencies come from Composer, front-end assets from Vite. Local development runs in [DDEV](https://ddev.com/).

## Structure

```
assets/            Front-end source (JS, SCSS, images)
config/            Bedrock config, per-environment overrides
web/wp/            WordPress core (installed by Composer, not in git)
web/app/themes/    Themes; brys-projects is the custom theme
web/app/plugins/   Plugins (installed by Composer, not in git)
```

## Requirements

- DDEV
- Node 20 or newer
- A Gravity Forms Elite (or legacy Developer) license
- An ACF Pro license

## Setup

1. Copy the example env file and fill it in:

   ```bash
   cp .env.example .env
   ```

2. Create `auth.json` in the project root with your license keys:

   ```json
   {
       "http-basic": {
           "connect.advancedcustomfields.com": {
               "username": "<ACF_PRO_KEY>",
               "password": "<site URL>"
           },
           "composer.gravity.io": {
               "username": "<Gravity Forms license key>",
               "password": "<site URL>"
           }
       }
   }
   ```

   Both `.env` and `auth.json` are ignored by git.

3. Start the site and install dependencies:

   ```bash
   ddev start
   ddev composer install
   npm install
   ```

The site runs at https://brys-projects.ddev.site.

## Front-end

```bash
npm run dev      # Vite dev server with hot reload on port 5173
npm run build    # Build to web/app/themes/brys-projects/assets/dist
```

Run `npm run build` before you deploy. The built files are committed.

## Composer packages

Plugins and themes from the WordPress.org directory come from
[WP Packages](https://wp-packages.org), the Roots replacement for WPackagist.
Use the `wp-plugin/` and `wp-theme/` prefixes:

```bash
ddev composer require wp-plugin/<slug>
```

Gravity Forms comes from the official `composer.gravity.io` repository as
`gravity/gravityforms`. ACF Pro comes from `connect.advancedcustomfields.com`.

## Deployment

`.github/workflows/deployment.yml` builds the assets and rsyncs the project to
the server. It is switched off: it listens on the `_main` branch, and its
Composer auth still uses the old `ACF_PRO_KEY` and `WP_PLUGIN_GF_KEY` secrets.
Both licenses now use `auth.json`, so the workflow needs an update before you
turn it on.
