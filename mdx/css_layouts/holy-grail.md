title: Holy Grail
source: https://www.youtube.com/shorts/IgofJWjnS1w
emmet: .grail>.box*5
---
.grail {
    display: grid;
    grid-template-columns: auto 1fr auto;
    grid-template-rows: repeat(3, 1fr);

    & .box:is(:nth-child(1), :nth-child(5)) {
        grid-column: span 3;
    }
}

&--&--&

/* for demo purposes */
.grail {
    & .box {
        border-radius: 0px;
    }
    & .box:is(:nth-child(2), :nth-child(4)) {
        min-width: 75px; 
    } 
}