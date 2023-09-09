title: Sidebar Split
source: 
emmet: .split>.box*2
---

.split {
    display: grid;
    grid-template-columns: auto 1fr;
}

&--&--&

/*for demo purposes*/
.split {
    & .box {
        border-radius: 0;
        min-height: 10rem;
    }

    & .box:first-child {
        min-width: 100px;
    } 
}