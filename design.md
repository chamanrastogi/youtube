# Design System — मिल्की शॉर्ट्स (Milky YouTube Shorts)

Source of truth for the visual design. Everything in `style.css` derives from the
tokens below. Built on **Bootstrap 5.3** (grid, navbar, buttons, accordion) with a
thin custom theme layer layered on top.

---

## 1. Brief (pinned)

- **Subject**: Milky — a dog who is the star of 10–15 second Hindi comedy Shorts for an Indian family audience.
- **Page job**: show a ready-to-shoot daily storyboard — every shot's visual, dialogue, on-screen text, and sound — so filming can start immediately.
- **Brief's own words that win**: "रियलिस्टिक सिनेमैटिक लुक" (realistic cinematic look), Hindi dialogue, no emojis.

## 2. Evidence used (ui-ux-pro-max data)

The `search.py` tool could not run (no Python runtime in this environment), so the same
data files were read directly. Verified records that shaped the design:

| Decision | Verified source | Record |
|---|---|---|
| Product pattern | `products.csv` #23 | **Pet Tech App** — "Storytelling-Driven", "Playful + Warm colors", "Photo galleries" |
| Palette family | `colors.csv` #23 | **Pet Tech App** — "Playful orange + trust blue" (`#F97316` / `#0F172A`) |
| Style | `styles.csv` #9 / #27 | **Claymorphism** (rounded, playful) + **Storytelling-Driven** landing — both list `bootstrap` compatibility |
| Hindi + Latin body font | `google-fonts.csv` | **Mukta** (scripts: `devanagari \| latin \| latin-ext`) |
| Display font | `google-fonts.csv` | **Anton** (Display, 400 — poster/headline energy) |
| Page flow | `landing.csv` #10 | **Scroll-Triggered Storytelling** — chapter structure, but "keep the narrative understandable without scroll effects" |
| Motion | `ux-guidelines.csv` #7, #9, #12 | Animate 1–2 elements per view max; respect `prefers-reduced-motion`; no decorative infinite animation |
| Icons | `styles.csv` + `ux` anti-patterns | Use inline **SVG**, not emoji |
| Touch | `ux-guidelines.csv` #22 | Web: ≥24 CSS px target, use 44px for comfort |

## 3. Two-pass plan and the revision

**First pass (rejected — it was the generic default).** Warm cream `#f9f6f2` + high-contrast
serif display + terracotta accent. This is exactly the calibration example the
frontend-design skill flags as a default that appears regardless of subject. It also had
no relationship to Shorts beyond "looks nice".

**Revised plan (built).** Ground the design in the physical artifacts of making a
Hindi dog Short: a **vertical 9:16 phone frame**, a **timecode**, and the **on-screen
caption** that sits in the video. The page is a **screening room** (warm near-black), and
the single accent is the colour of the **biscuit that is Milky's "salary"** in the story.

## 4. Color tokens

| Token | Hex | Role | Note |
|---|---|---|---|
| `--mk-ink` | `#171310` | Page background | Warm near-black screening room, **not** cold `#000` |
| `--mk-ink-2` | `#1f1913` | Alternating band / frame gradient | |
| `--mk-surface` | `#241d16` | Cards, prompts, accordion | |
| `--mk-line` | `rgba(242,233,220,.14)` | Hairline borders | One border colour everywhere |
| `--mk-text` | `#f2e9dc` | Body text | Warm off-white |
| `--mk-text-dim` | `#b9a995` | Secondary text | Contrast checked on `#171310` (≥ 4.5:1) |
| `--mk-accent` | `#efa33c` | **Signature accent** — biscuit/haldi amber | Contrast on ink ≈ 8:1 |
| `--mk-accent-hi` | `#ffbb5e` | Hover/active | |
| `--mk-accent-ink` | `#1a1206` | Text on accent fills | |

Bootstrap's own variables are re-pointed at these tokens (see top of `style.css`) so
native components inherit the theme instead of being overridden per-selector.

## 5. Typography

| Role | Font | Why | Verified |
|---|---|---|---|
| Display (poster) | **Anton** | Condensed poster face → film-title / Bollywood-poster energy; used with restraint for `MILKY` and section heads | ✅ `google-fonts.csv` |
| Body + Hindi | **Mukta** | Designed for Devanagari with matching Latin; natural for conversational Hindi; weights 300–800 | ✅ `google-fonts.csv` |
| Utility | system mono stack | Timecodes and shot numbers align; tabular feel | — |

Type scale: poster `clamp(3.6rem, 13vw, 7.5rem)`, Hindi title `clamp(1.25rem, 4vw, 1.9rem)`,
section head `clamp(1.8rem, 4.4vw, 2.6rem)`, body `1rem / 1.6`.

## 6. Layout

Two-column on desktop, single column on mobile. Scenes are read in shooting order,
which is why numbered shot markers are legitimate here (the content genuinely is a sequence).

```
MOBILE (stack)                    DESKTOP (per scene)
+---------------------+           +--------+--------------------------------+
|  NAV (sticky)       |           | NAV (sticky)                            |
+---------------------+           +--------+--------------------------------+
|  HERO               |           | HERO                                             |
|   MILKY (poster)    |           |  poster + specs + CTA   |  9:16 frame (hero)   |
|   9:16 frame        |           +--------+--------------------------------+
+---------------------+           | SHOT 01| frame  | visual + dialogue + sfx  |
| SHOT 01  frame      |           | SHOT 02| frame  | visual + dialogue + sfx  |
|          + details  |           | SHOT 03| frame  | visual + dialogue + sfx  |
+---------------------+           +--------+--------------------------------+
| direction / prompt / tags        | direction / prompt / tags                |
+---------------------+           +------------------------------------------+
```

## 7. Signature element

**The vertical 9:16 "shot frame" with the real on-screen caption baked in** (timecode bar
on top, amber caption chip at the bottom). It is the one memorable thing: it shows a Short
the way it will actually ship, and it repeats identically for every story — building
brand recognition. Everything else (nav, text, accordion) stays quiet to let it lead.

The single orchestrated motion moment is the brief's own **light flash** on the hero frame
at load (`data-flash`), disabled under reduced motion.

## 8. Accessibility floor (non-negotiable)

- Contrast ≥ 4.5:1 for all text (accent on ink ≈ 8:1; dim text on ink ≥ 4.5:1).
- One consistent `:focus-visible` ring (3px accent, 2px offset) on every interactive element.
- Skip-to-content link.
- Touch targets: interactive controls are ≥ 44px tall.
- `prefers-reduced-motion: reduce` kills the flash and all transitions.
- `scroll-padding-top` so the sticky navbar never covers an anchor target.
- Semantic landmarks: `nav`, `header`, `main`, `section[aria-labelledby]`, `article`, `footer`.
- No emoji used as icons — inline SVG only.
- Decorative SVGs are `aria-hidden`; scene frames expose a descriptive `role="img"` label.

## 9. Anti-patterns to avoid (from the data)

- Don't animate more than one or two elements per view (cluttered, motion-sick).
- Don't rely on hover for primary actions on touch.
- Don't use emoji as UI icons.
- Don't let content span the full viewport width — prose stays under ~46ch.
- Don't stack multiple fixed elements carelessly (only the navbar is sticky).
