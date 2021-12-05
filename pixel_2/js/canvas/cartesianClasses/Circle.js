class Circle {
    constructor(x, y, radius = 1, color = "red", strokeWidth = 1, strokeColor = "black") {
        this.x = x;
        this.y = y;
        this.radius = radius;
        this.color = color;
        this.strokeColor = strokeColor;
        this.strokeWidth = strokeWidth;
    }

    draw(ctx, x = this.x, y = this.y, radius = this.radius, color = this.color, strokeColor = this.strokeColor, strokeWidth = this.strokeWidth) {
        ctx.beginPath();
        ctx.arc(x, y, radius, 0, 2 * Math.PI);
        ctx.fillStyle = color;
        ctx.fill();
        ctx.lineWidth = strokeWidth;
        ctx.strokeStyle = strokeColor;
        ctx.stroke();
    }

    paint(ctx, color = "red"){
        this.color = color;
        this.draw(ctx);
    }
}