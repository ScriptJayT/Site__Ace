title: Split Screen
source: https://www.youtube.com/watch?v=Ivk8Blw2VTI&t=3s
emmet: .split-screen>.img+.box>.txt
---
.split-screen {
    --wrapper-pi: 1rem;
    --wrapper-mw: 50rem;

    position: relative;
    display: grid;
    grid-template-columns:
        minmax(var(--wrapper-pi), 1fr)
        minmax(0, calc(var(--wrapper-mw) / 2))
        minmax(0, calc(var(--wrapper-mw) / 2))
        minmax(var(--wrapper-pi), 1fr);

    & .img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        
        &:first-child {
            grid-column: 1 / 3;
        }

        &:last-child {
            grid-column: 3 / -1;
        }
    }

    & :not(.img) {
        display: grid;
        align-content: center;
        justify-items: start;

        &:first-child {
            padding-left: 0;
            grid-column: 2 / 3;
        }

        &:last-child {
            padding-right: 0;
            grid-column: 3 / 4;
        }

        &::before {
            content: "";
            position: absolute;
            inset: 0;
            background: inherit;
        }
        &:first-child::before {
            grid-column: 1 / 2;
        }
        &:last-child::before {
            grid-column: 4 / 5;
        }
    }
}