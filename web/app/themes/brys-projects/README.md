# Brys Projects theme

## How the homepage is built

The homepage template is `page-templates/home.php`. It calls one partial per section
from `partials/blocks/` and passes the content as arguments, so the content is not
baked into the block. The content is still static: it lives in the template, not in
WordPress fields.

| Block | File |
| --- | --- |
| Hero | `partials/blocks/hero.php` |
| Onze realisaties | `partials/blocks/realisaties.php` |
| Statement and pillars | `partials/blocks/statement.php` |
| Two images with text | `partials/blocks/detail.php` |
| Refined by strength | `partials/blocks/toepassingen.php` |
| Footer | `partials/blocks/footer.php` |

Every block takes a `classes` argument. The homepage uses it for the space above the
block, so the vertical rhythm stays in one file.

## Sizes and the grid

The design is drawn on a 1920px frame with a 1640px container and a 12 column grid
with a 64px gutter. One column is 78px wide.

All sizes are written in rem, where `1rem = 16px` at 1920px. So a value of 120px in
the design becomes `7.5rem`. The root font size does the scaling:

- 1768px and wider: the container reaches its full 1640px and the page matches the
  design pixel for pixel.
- 1280px to 1768px: the root font size shrinks with the viewport
  (`assets/scss/elements/_root.scss`), so the whole design scales down as one piece.
- Under 1280px: the root font size goes back to 16px and the blocks switch to a
  stacked layout. Those rules live in `assets/scss/blocks/`.

## Colors and fonts

Both are defined in `assets/scss/_tailwind.scss` (for the Tailwind classes) and in
`assets/scss/settings/_colors.scss` (for the Sass variables). Keep them in sync.

| Token | Value | Used for |
| --- | --- | --- |
| `paper` | `#F3EFE6` | page background |
| `shell` | `#FCFCFA` | lighter panel in the middle of the page |
| `ink` | `#35291D` | text and footer background |
| `sage` | `#929576` | statement and pillar numbers |
| `rule` | `#5D513F` | rule in the footer |

The design uses Financier Display, which is a paid font. The theme uses
**Newsreader** instead, the closest free match. The body font is **Mulish**. Both are
self hosted in `assets/fonts/` and declared in `assets/scss/settings/_fonts.scss`.

## Two things to replace before go live

1. **The photos** are cut out of the design export, so they are 1x only and look soft
   on a retina screen. The bottom left corner of `toepassingen.jpg` was retouched,
   because the heading was burned into the export. Replace all of them with the
   original photos.
2. **The footer data** (address, e-mail, menu links) is hard coded in `footer.php`.

## Build

```
npm run dev     # vite dev server, needs ddev running
npm run build   # writes to web/app/themes/brys-projects/assets/dist
```

`assets/js/main.js` imports `main.scss`, so the dev server serves the styles through
the script tag. In production `functions.php` reads `assets/dist/.vite/manifest.json`
to find the hashed files.
