title: Images & Media Reset
source: https://www.youtube.com/watch?v=345V2MU3E_w
---
// prevent overflow by limiting size
:where(img, svg, picture) {
    max-width: 100%;
}
:where(svg, picture) {
    display: block;
}
:where(img) {
    height: auto;
    // remove white-space below image
    vertical-align: middle;
    // alt-text styling
    text-style: italic;
    // in case of blurry preload by using the background style
    background-repeat: no-repeat;
    background-size: cover;
    // in case of floated next to text, gap
    shape-margin: 1rem;
}