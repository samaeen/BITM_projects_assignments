var constellation = [];
var n;
var d;
var teamName="Team: UpsideDown"
var myName="Sama-E-Shan(Shoummo)";
var myRoll="SEID:181663";

var img;
//function preload() {
//    img = loadImage("");
//}

function setup() {
    //image(img, 0, 0);
    createCanvas(1400,650);
    pixelDensity(1); // Set 1 because it's too slow on firefox
    //pixelDensity(displayDensity());
    n = 200;

    for (var i = 0; i <= n; i++) {
        constellation.push(new star());
    }
    strokeWeight(.75);
    stroke('#FFFFFF');
}

function draw() {

    background(30);

    textSize(20);
    textAlign(CENTER);
    fill('#309FC7');
    text(teamName, width/2-50, height/2);
    fill('#71C730');
    text(myName, width/2-50, height/2+30);
    fill('#3080C7');
    text(myRoll, width/2-50, height/2+60);

    for (var i = 0; i < constellation.length; i++) {
        constellation[i].update();
        for (var j = 0; j < constellation.length; j++) {
            if (i > j) { // "if (i > j)" => to check one time distance between two stars
                d = constellation[i].loc.dist(constellation[j].loc); // Distance between two stars
                if (d <= width / 10) { // if d is less than width/10 px, we draw a line between the two stars
                    line(constellation[i].loc.x, constellation[i].loc.y, constellation[j].loc.x, constellation[j].loc.y)
                }
            }
        }
    }

}

function star() {

    this.a = random(5 * TAU); // "5*TAU" => render will be more homogeneous
    this.r = random(width * .2, width * .25); // first position will looks like a donut
    this.loc = createVector(width / 2 + sin(this.a) * this.r, height / 2 + cos(this.a) * this.r);
    this.speed = createVector();
    this.speed = p5.Vector.random2D();
    //this.speed.random2D();
    this.bam = createVector();
    this.m;


    this.update = function() {
        this.bam = p5.Vector.random2D(); // movement of star will be a bit erractic
        //this.bam.random2D();
        this.bam.mult(0.45);
        this.speed.add(this.bam);
        // speed is done according distance between loc and the mouse :
        this.m = constrain(map(dist(this.loc.x, this.loc.y, mouseX, mouseY), 0, width, 8, .05), .05, 8); // constrain => avoid returning "not a number"
        this.speed.normalize().mult(this.m);

        // No colision detection, instead loc is out of bound
        // it reappears on the opposite side :
        if (dist(this.loc.x, this.loc.y, width / 2, height / 2) > (width / 2) * 0.98) {
            if (this.loc.x < width / 2) {
                this.loc.x = width - this.loc.x - 4; // "-4" => avoid blinking stuff
            } else if (this.loc.x > width / 2) {
                this.loc.x = width - this.loc.x + 4; // "+4"  => avoid blinking stuff
            }
            if (this.loc.y < height / 2) {
                this.loc.y = width - this.loc.y - 4;
            } else if (this.loc.x > height / 2) {
                this.loc.y = width - this.loc.y + 4;
            }
        }
        this.loc = this.loc.add(this.speed);
    } // End of update()
} // End of class