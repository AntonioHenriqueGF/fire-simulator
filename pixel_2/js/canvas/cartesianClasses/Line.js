class Line {

    constructor(p1 = null, p2 = null){
        this.p1 = p1;
        this.p2 = p2;
    }

    defineLine(x1, y1, x2 = x1, y2 = y1) {
        this.p1 = new Point2D(x1, y1);
        this.p2 = new Point2D(x2, y2);
    }

    connectPoints(p1 = null, p2 = null){
        this.p1 = p1;
        this.p2 = p2;
    }

    draw(ctx, color = "red"){
        ctx.beginPath();
        ctx.moveTo(this.p1.x, this.p1.y);
        ctx.lineTo(this.p2.x, this.p2.y);
        ctx.strokeStyle = color;
        ctx.stroke();
        return this;
    }

    intersection(line){
        const x1 = this.p1.x;
        const y1 = this.p1.y;
        const x2 = this.p2.x;
        const y2 = this.p2.y;

        const x3 = line.p1.x;
        const y3 = line.p1.y;
        const x4 = line.p2.x;
        const y4 = line.p2.y;

        const den = (x1 - x2) * (y3 - y4) - (y1 - y2) * (x3 - x4);
        if (den == 0){
            return false;
        }

        const t = ((x1 - x3) * (y3 - y4) - (y1 - y3) * (x3 - x4)) / den;
        const u = -((x1 - x2) * (y1 - y3) - (y1 - y2) * (x1 - x3)) / den;

        if (t >= 0 && t <= 1 && u >= 0 && u <= 1){
            return new Point2D( (x1 + t * (x2 - x1)), (y1 + t * (y2 - y1)) );
        } else {
            return false;
        }
    }

    setP1(x, y){
        this.p1 = new Point2D(x, y);
        return this;
    }

    setP2(x, y){
        this.p2 = new Point2D(x, y);
        return this;
    }
}