class message {

    static message = null;

    static fetch() {
        if(message.element) return;
        message.element = document.getElementById("message");
    }

    static append(_body) {
        message.fetch();
        message.element.append(_body);
    }

    static send(_txt) {
        const x = document.createElement("output");
        x.textContent = _txt;
        x.setAttribute('role', 'log');
        x.addEventListener("animationend", ({animationName})=>{
            if(animationName !== "fade-out") return;
            x.remove();
        });

        message.append(x);
    }
}

class copy_code {
    constructor(_parent){
        this.body = _parent;
        this.btn = this.body.querySelector("button");
        this.code = this.body.querySelector("code").textContent;
        this.title = this.body.closest('.showcase')?.querySelector("h2")?.textContent?.trim() ?? "Showcase";
        if(this.code && this.btn) this.listen();
    }
    
    listen(){
        this.btn.addEventListener('click',()=>{
            this.clip(this.code)
                .then(()=> message.send('copied code for ' + this.title ) )
                .catch((er)=>{
                    message.send('copy failed');
                    console.warn(er);
                });
        });
    }

    async clip(_txt) {
        return await navigator.clipboard.writeText(_txt);
    }
}

document.querySelectorAll('.copy-block')?.forEach(_i => new copy_code(_i));