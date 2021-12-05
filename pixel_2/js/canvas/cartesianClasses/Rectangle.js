class Rectangle {
    constructor(x, y, width, height, color = "red", strokeWidth = 1 , strokeColor = "black") {
        this.x = x;
        this.y = y;
        this.width = width;
        this.height = height;
        this.color = color;
        this.strokeWidth = strokeWidth;
        this.strokeColor = strokeColor;
    }

    getX() {
        return this.x;
    }

    getY() {
        return this.y;
    }

    getWidth() {
        return this.width;
    }

    getHeight() {
        return this.height;
    }

    getRight() {
        return this.x + this.width;
    }

    getBottom() {
        return this.y + this.height;
    }

    getTopLeft() {
        return new Point(this.x, this.y);
    }

    getTopRight() {
        return new Point(this.x + this.width, this.y);
    }

    getBottomLeft() {
        return new Point(this.x, this.y + this.height);
    }

    getBottomRight() {
        return new Point(this.x + this.width, this.y + this.height);
    }

    getCenter() {
        return new Point(this.x + this.width / 2, this.y + this.height / 2);
    }

    getArea() {
        return this.width * this.height;
    }

    getPerimeter() {
        return 2 * (this.width + this.height);
    }

    contains(point) {
        return point.getX() >= this.x && point.getX() <= this.x + this.width &&
            point.getY() >= this.y && point.getY() <= this.y + this.height;
    }
    
    draw(ctx, x = this.x, y = this.y, width = this.width, height = this.height, color = this.color, strokeWidth = this.strokeWidth , strokeColor = this.strokeColor) {
        ctx.beginPath();
        ctx.rect(x, y, width, height);
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

    write(ctx, str, x = this.x, y = this.y){
        ctx.font = "20px Arial";
        ctx.fillStyle = "blue";
        ctx.fillText(str, x, y + this.height);
    }
}