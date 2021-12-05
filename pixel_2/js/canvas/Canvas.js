// import * as line from './cartesianClasses/Line.js';
// import * as point from './cartesianClasses/Point.js';
// import * as circle from './cartesianClasses/Circle.js';
// import * as rectangle from './cartesianClasses/Rectangle.js';

document.writeln("<script type='text/javascript' src='./js/canvas/cartesianClasses/Circle.js'></script>");
document.writeln("<script type='text/javascript' src='./js/canvas/cartesianClasses/Line.js'></script>");
document.writeln("<script type='text/javascript' src='./js/canvas/cartesianClasses/Point2D.js'></script>");
document.writeln("<script type='text/javascript' src='./js/canvas/cartesianClasses/Rectangle.js'></script>");


class Canvas {
    constructor(canvas, x, y, backgroundColor='white'){
        this.CANVAS = canvas
        this.WIDTH = x;
        this.HEIGHT = y;
        this.CONTEXT = this.CANVAS.getContext("2d");
        this.CANVAS.width = this.WIDTH;
        this.CANVAS.height = this.HEIGHT;
        this.BACKGROUND_COLOR = backgroundColor;
        this.CONTEXT.fillStyle = this.BACKGROUND_COLOR;
        this.CONTEXT.fillRect(0, 0, this.WIDTH, this.HEIGHT);
    }

    getContext(){
        return this.CONTEXT;
    }

    update(){
        this.CONTEXT.fillStyle = this.BACKGROUND_COLOR;
        this.CONTEXT.fillRect(0, 0, this.WIDTH, this.HEIGHT);
    }
}