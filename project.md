# Project — मिल्की शॉर्ट्स website

A one-page site that holds the ready-to-shoot storyboard for the Hindi comedy Shorts
starring **Milky** the dog, for the channel [@chamanrastogi](https://www.youtube.com/@chamanrastogi).

## What the site does

Shows every shot of a daily Short in one place — the visual, the Hindi dialogue, the
on-screen caption, and the sound — so filming can start without re-reading notes.
It also exposes the hashtags and a copy-ready AI video prompt.

## Files

| File | Purpose |
|---|---|
| `index.html` | The page. Bootstrap 5.3 (CDN) + Google Fonts (Anton, Mukta) + `style.css`. |
| `style.css` | Theme layer: design tokens, component styling, focus/motion rules. |
| `design.md` | **Design source of truth** — tokens, typography, layout, signature, a11y floor. |
| `project.md` | This file — what it is, how to run, how to extend. |
| `README.md` | Short orientation for anyone opening the folder. |

## Run it

Static files — no build step.

```
open index.html            # Windows: double-click it, or:
start index.html
```

Optional local server:

```
npx serve .                # or:  python -m http.server 8080
```

## Tech decisions

- **Bootstrap 5.3 via CDN** — satisfies the "use Bootstrap" requirement and provides the
  grid, navbar (with mobile toggler), buttons, and accordion. Pinned with SRI hashes.
- **Custom theme over default Bootstrap** — Bootstrap's CSS variables are re-pointed at the
  project tokens in `style.css`, so native components inherit the theme cleanly.
- **No emoji** anywhere (style rule + ui-ux-pro-max anti-pattern). Icons are inline SVG.
- **`data-bs-theme="dark"`** on `<html>` so Bootstrap's own dark component styles apply
  beneath the theme.

## Current story: "घर का असली बॉस"

| Shot | Timecode | Title | On-screen text |
|---|---|---|---|
| 01 | 00:00–00:10 | नया बॉस | जब घर में कुत्ता बन जाए बॉस! |
| 02 | 00:10–00:20 | बॉस का ऑर्डर | बॉस से पंगा महंगा पड़ेगा! |
| 03 | 00:20–00:30 | असली सैलरी | घर का असली बॉस कौन? |

Characters used: **मिल्की**, **पापा**, **मम्मी**. Keep to only the characters a story needs.

## How to add a new story (or a new shot)

1. Copy one `<article class="mk-shot">…</article>` block in `index.html`.
2. Update, in order: the shot number (शॉट 0X), the timecode, the frame's `aria-label`,
   the on-screen caption (`mk-frame__caption`), the title, the visual, the dialogue
   (`mk-lines`), and the sound line (`mk-sfx`).
3. Keep shot numbers in real shooting order — the numbering is meaningful here.

## Content rules (from the channel brief)

- Natural, conversational Hindi — not literary Hindi — in the dialogue.
- No emojis in dialogue, titles, descriptions, tags, or hashtags.
- 10–15 second default; lead with a hook and end on a punchline or reaction.
- Comedy: Milky creates the joke through action and reaction, not long lines.
- Hashtags: dog / pet / Shorts focused, and not too many.

## Verification

The design was cross-checked against the `ui-ux-pro-max` data files for product pattern,
palette, style, Devanagari typography, and UX rules. See `design.md` §2 for the exact
records. Note: the skill's Python search tool was unavailable, so records were read
directly rather than queried.

Open `index.html` and check, at mobile and desktop widths:

- [ ] No horizontal scrolling at 360px wide
- [ ] Sticky navbar never covers a section heading after clicking a nav link
- [ ] Tab through the page — focus ring is visible on every control
- [ ] Hero light flash is absent when the OS "reduce motion" setting is on
- [ ] Copy button changes to "कॉपी हो गया" after a click
