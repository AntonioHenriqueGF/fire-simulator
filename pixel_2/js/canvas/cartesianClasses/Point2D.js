class Point2D {
    constructor(x, y){
        this.x = x;
        this.y = y;
    }

    draw(ctx, color = "red"){
        ctx.beginPath();
        ctx.arc(this.x, this.y, 3, 0, 2 * Math.PI);
        ctx.fillStyle = color;
        ctx.fill();
    }
}