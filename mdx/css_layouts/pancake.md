title: Pancake
source: https://www.youtube.com/shorts/3JHBYawkwqU
emmet: .pancake>.box*4
---
.pancake {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem; /* adjustable */

    & > * {
        width: 100%;
        max-width: 175px; /* adjustable */
    }
}