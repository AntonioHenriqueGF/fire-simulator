class FireParticle {
    constructor (ctx, rectangle, heat) {
        this.ctx = ctx;
        this.rectangle = rectangle;
        this.heat = heat;
        this.color = "rgb(255, 255, 0)";
    }

    setHeat(heat) {
        if (heat < 0) {
            heat = 0;
        }else if (heat > 1) {
            heat = 1;
        }
        this.heat = heat;
    }

    getHeat() {
        return this.heat;
    }

    cool(loss = 0.01) {
        this.setHeat(this.getHeat() - loss);
    }

    takeHeat(amount){
        if (this.heat < amount) {
            this.setHeat(0);
            return 0;
        }
        this.cool(amount)
        return amount;
    }

    receiveHeat(amount) {
        this.setHeat(this.getHeat() + amount);
    }

    update () {
        this.cool();
        let r = Math.floor((1 - Math.pow(Math.E, -5 * this.heat)) * 255);
        let g = Math.floor(this.heat * 200);
        this.color = "rgb(" + r + ", " + g + ", 0)";
        this.paint();
    }

    paint(color = this.color) {
        this.rectangle.paint(this.ctx, color);
    }

    getColor () {
        return this.color;
    }

    displayHeat() {
        this.rectangle.write(this.ctx, Math.floor(this.getHeat() * 1000) / 1000);
    }
}