# Brys Projects theme

## How the homepage is built

The homepage template is `page-templates/home.php`. It calls one partial per section
from `partials/blocks/` and passes the content as arguments, so the content is not
baked into the block. The content is still static: it lives in the template, not in
WordPress fields.

| Block | File |
| --- | --- |
| Hero | `partials/blocks/hero.php` |
| Onze diensten | `partials/blocks/realisaties.php` |
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
- Under 768px (a phone): the header drops the contact link and shows the logo on
  the left, and the page titles scale with the screen width.

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

## The Realisaties page

Template `page-templates/realisaties.php`, set it on the page with slug `realisaties`.

| Block | File |
| --- | --- |
| Title, count and intro | `partials/blocks/page-intro.php` |
| Photo wall | `partials/blocks/wall.php` |
| Closing call to action | `partials/blocks/cta.php` |

How the photo wall works:

- Photos are listed in the template as `image`, `ratio` (for example `4/5`), `alt`,
  an optional `caption` and an optional `feature`. The ratio sets the crop.
- The wall is built from rows on the 12 column grid. Six row layouts take turns, see
  `$layouts` at the top of `wall.php`: pairs with their tops or bottoms on one line,
  single photos, and pairs where one photo drops lower.
- Only the dropped photos move on scroll, so the aligned rows keep their lines.
- A row with one photo always shows a portrait. The next portrait in the list moves
  forward, or the photo is cropped to 4:5 when no portrait is left.
- A photo with `'feature' => true` gets its own row as a large portrait that runs off
  the edge of the screen, right and left in turn. Use it once or twice.
- Under 640px the rows stack in one column. The second photo of a pair is 80% wide.
- `assets/js/wall.js` reveals each photo when it scrolls into view and moves the
  dropped photos. Both are off when the visitor prefers reduced motion.

The photos are placeholders: the design photos, reused with other crops.

## The Microcement page

Template `page-templates/microcement.php`, set it on the page with slug `microcement`.

| Block | File |
| --- | --- |
| Heading, image and intro | `partials/blocks/showcase.php` |
| Het materiaal | `partials/blocks/lead.php` |
| Toepassingen, with a photo on hover | `partials/blocks/index-list.php` |
| Kleur en textuur | `partials/blocks/tones.php` |
| Werkwijze | `partials/blocks/steps.php` |
| Closing call to action | `partials/blocks/cta.php` |

The lighter panel uses `c-panel--left`: it starts at the left edge of the screen,
because the image in the header bleeds to the left. The header image hangs 10rem
into the panel, like on the homepage.

## The FAQ page

Template `page-templates/faq.php`, set it on the page with slug `veelgestelde-vragen`.
Other pages link to `/veelgestelde-vragen`.

- Each topic is one `partials/blocks/faq.php` block, with the topic as its title.
- To add a topic, add one more faq block to the template.

## The Werkwijze page

Template `page-templates/werkwijze.php`, set it on the page with slug `werkwijze`.

| Block | File |
| --- | --- |
| Title and intro | `partials/blocks/page-intro.php` |
| Large image | `partials/blocks/figure.php` |
| The five steps | `partials/blocks/process.php` |
| Closing call to action | `partials/blocks/cta.php` |

The call to action links to `/contact#offerte`, which opens the quote form.

## The Over ons page

Template `page-templates/over-ons.php`, set it on the page with slug `over-ons`.

| Block | File |
| --- | --- |
| Title and intro | `partials/blocks/page-intro.php` |
| Large image | `partials/blocks/figure.php` |
| Ons verhaal | `partials/blocks/lead.php` |
| Closing call to action | `partials/blocks/cta.php` |

`figure.php` takes `align`: the side where the image runs to the edge of the screen.

## The Contact page

Template `page-templates/contact.php`, set it on the page with slug `contact`.

| Block | File |
| --- | --- |
| Title and intro | `partials/blocks/page-intro.php` |
| Contact details and forms | `partials/blocks/contact.php` |

- The contact details are a list in the template. Each row has a label and lines.
- There is one tab per form: "Een vraag" and "Een offerte".
- `assets/js/contact.js` switches the tabs. The arrow keys work too.
- `/contact#offerte` opens the quote tab. Link to it from other pages.

### Gravity Forms

The template loads each form by its **title**, so the form id can differ per site.

| Tab | Form title | Fields |
| --- | --- | --- |
| Een vraag | `Contact` | naam, e-mail, telefoon, vraag |
| Een offerte | `Offerte` | naam, e-mail, telefoon, gemeente, type werk, start, omschrijving, foto's |

- Create both forms on every site with exactly these titles.
- The plugin's own css is off (`plugins/gravityforms.php`). All form styles live in
  `assets/scss/components/_form.scss`.
- Set a field to width "half" in the form editor to place two fields next to each other.
- End each form with an html field for the privacy note.
- Without Gravity Forms active, the page shows the e-mail address instead.

## Motion

| What | File |
| --- | --- |
| Smooth scroll (Lenis) | `assets/js/smooth-scroll.js` |
| Scroll reveals | `assets/js/reveal.js`, `assets/scss/utilities/_reveal.scss` |
| Page transition | `assets/scss/utilities/_reveal.scss` |

Scroll reveals are set in the markup with a `data-reveal` attribute:

| Value | Put it on | Effect |
| --- | --- | --- |
| `lines` | a heading | the lines rise out of a mask, like the menu |
| `fade` | text, links, list items | fades in and moves up, in turn with its neighbours |
| `image` | the wrapper of an `img` | the image fades in and zooms out over dark brown |

- Add `data-reveal-sequence` to a section to make its fades wait until the title has
  mostly landed.
- The Realisaties photo wall has its own reveal in `assets/js/wall.js`.
- The page transition uses cross document view transitions. Browsers without support
  load the page as normal.
- With reduced motion on, there is no smooth scroll, no reveal and no transition.

## Three things to replace before go live

1. **The photos** are cut out of the design export, so they are 1x only and look soft
   on a retina screen. The bottom left corner of `toepassingen.jpg` was retouched,
   because the heading was burned into the export. Replace all of them with the
   original photos.
2. **The footer data** (address, e-mail, menu links) is hard coded in `footer.php`.
3. **The phone number and social links** on the Contact page are placeholders.

## Build

```
npm run dev     # vite dev server, needs ddev running
npm run build   # writes to web/app/themes/brys-projects/assets/dist
```

`assets/js/main.js` imports `main.scss`, so the dev server serves the styles through
the script tag. That script runs after the first paint, so in dev `functions.php` also
loads `main.scss` as a normal stylesheet. `main.js` removes that stylesheet once Vite
has added its own style tag, so hot reload keeps working. In production `functions.php` reads `assets/dist/.vite/manifest.json`
to find the hashed files.
