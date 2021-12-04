<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fogo Grátis 2</title>
    <style>
        .linha {
            display: flex;
        }

        .pixel {
            width:  25px;
            height: 25px;
            font-size: 60%;
            text-align: center;
            color: #fff;
        }

        .flex-center{
            display:flex;
            align-content: center;
            width: 90%;
        }

        .h-center{
            margin: 0 auto;
            text-align: center;
        }

        .col{
            display: flex;
            align-content: center;
            flex-direction: column;
        }

        .col div{
            margin-left: 100%;
        }

    </style>
</head>
<body>
    <div class="linha">
        <div>
            <?php
                $width  = 30;
                $height = 20;
                if ($height < 100){
                    $gap = 100;
                }else{
                    $gap = 1000;
                }
                echo "<div class='linha'>";
                for ($i = 1; $i <= $width; $i++){
                    $rand = rand(0, 255);
                    echo "<div class='pixel'>$i</div>";
                }
                echo "</div>";
                for ($n = 0; $n < $height; $n++){
                    echo "<div class='linha'>";
                    for ($i = 0; $i < $width; $i++){
                        if ($n == $height){
                            $rand = rand(0, 255);
                            $style = ("style='background-color: rgb(0, 0, 0)");
                        }else{
                            $style = ("style='background-color: rgb(0, 0, 0)");
                        }
                        echo "<div class='pixel' id='". ($n*$gap + $i) ."' style='background-color: rgb(0, 0, 0);' onload='heatLoss(this)'></div>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
        <div class="col">
            <div class="h-center"><br><br><br><br>
                Vento: <br>
                <input type="range" name="wind" id="wind">
            </div>
            <div class="h-center"><br><br><br><br>
                Calor: <br>
                <input type="range" name="heat" id="heat" min="0" max="155">
            </div>
            <div class="h-center"><br><br><br><br>
                Oxigenio: <br>
                <input type="range" name="oxi" id="oxi" min="10" max="100">
            </div>
        </div>
    </div>
    <script>

        function rgb(r, g, b){
            return `rgb(${r},${g},${b})`
        }

        function heatColor(h){
            return rgb(h,h-60,0)
        }

        var width = <?=$width;?>;
        var height = <?=$height;?>;

        var pixel = new Array(height)

        for (h = 0; h<height; h++){
            pixel[h] = new Array(width)
            for (w = 0; w<width; w++){
                pixel[h][w] = new Array(2)
            }
        }

        for (h = 0; h<height; h++){
            for (w = 0; w<width; w++){
                var id = (h*<?=$gap;?>) + w;
                pixel[h][w][0] = id;
                if (h==height-1){
                    pixel[h][w][1] = Math.floor(Math.random() * 255 + 1)
                }else{
                    pixel[h][w][1] = 0
                }
            }
        }

        var x = 0
        var y = 0

        function next(){
            if (x < width - 1){
                x++
            }else{
                x = 0
                if (y < height - 1){
                    y++
                }else{
                    y = 0
                }
            }
        }

        function previous(){
            if (x > 0){
                x--
            }else{
                x = windth - 1
                if (y > 0){
                    y--
                }else{
                    y = height - 1
                }
            }
        }


        setInterval(function(){
            var going = true
            for (w = 0; w<width; w++){
                pixel[height-1][w][1] = Math.floor(Math.random() * 255 + 1)
            }
            while (going){
                if (pixel[y][x][1] > 0){
                    /*
                    loss = Math.floor(Math.random() * 100 + 1)
                    wind = document.getElementById("wind").value
                    offset = (Math.random() >= wind/100 ? 1 : 0)
                    ux = (x-offset > 0 ? x-offset : width-1)
                    uy = (y != 0 ? y-1 : height - 1)

                    pixel[y][x][1] = Math.floor( pixel[y][x][1] - loss/pixel[y][x][1])
                    pixel[uy][ux][1] = Math.floor( pixel[uy][ux][1] + loss/20)

                    pix = document.getElementById(pixel[y][x][0])
                    pix_above = document.getElementById(pixel[uy][ux][0])
                    pix.style.backgroundColor = heatColor(pixel[y][x][1])
                    pix.innerText = pixel[y][x][1]
                    */

                    

                }else{
                    pixel[y][x][1] = 0
                    document.getElementById(pixel[y][x][0]).innerText = ''
                }
                if (y == (height-1) && x == (width-1)){
                    going = false
                }
                next()
            }
        },500)

        console.log([pixel])


    </script>
</body>
</html>