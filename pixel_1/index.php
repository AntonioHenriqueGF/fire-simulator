<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fogo grátis</title>
    <style>
        .linha {
            display: flex;
        }

        .pixel {
            width:  6px;
            height: 6px;
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
                $width  = 50;
                $height = 50;
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
                for ($n = 1; $n <= $height; $n++){
                    echo "<div class='linha'>";
                    for ($i = 1; $i <= $width; $i++){
                        if ($n == $height){
                            $rand = rand(0, 255);
                            $style = ("style='background-color: rgb(". $rand.", ". ($rand - ($rand * 0.4)) .", 0)");
                        }else{
                            $style = ("style='background-color: rgb(0, 0, 0)");
                        }
                        echo "<div class='pixel' id='". ($n*$gap + $i) ."' ".$style.";' onload='heatLoss(this)'></div>";
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

        var width = <?=$width;?>;
        var height = <?=$height;?>;

        pixel = new Array(height)

        for (i = 1; i <= height; i++){
            pixel[i] = new Array(width)
        }

        for (h = 1; h <= height; h++){
            for (w = 1; w <= width; w++){
                pixel[h][w] = document.getElementById(h*100+w)
                pixel[h][w].addEventListener("load",heatLoss(pixel[h][w]))
            }
        }

        function heatLoss(obj){
            setInterval(function(){
                var rgb = obj.style.backgroundColor;
                //console.log(rgb)
                rgb = rgb.substring(4, rgb.length-1).replace(/ /g, '').split(',');
                var r = Number(rgb[0]);
                var g = Number(rgb[1]);
                if (r != 0 || g != 0){
                    var loss = Math.floor(Math.random() *(100 - document.getElementById("oxi").value));
                    var obj_over = obj.id > 99 ? document.getElementById(Number(obj.id) - <?= $gap;?> + (Math.random() > (document.getElementById("wind").value / 100) ? 0 : 1 )) : false;

                    obj.style.backgroundColor = 'rgb('+ ((r/loss) - loss) +', '+ ((r/(loss*4)) - loss) +', 0)';

                    if (obj_over){
                        var rgb_over = obj_over.style.backgroundColor;
                        rgb_over = rgb_over.substring(4, rgb_over.length-1).replace(/ /g, '').split(',');
                        var ro = rgb_over[0];
                        var go = rgb_over[1];
                        obj_over.style.backgroundColor = 'rgb('+ (r-loss) +','+ ((r-50)-loss) +',0)'
                    }
                }

            }, 100)
        }
        setInterval(function(){
            var heat = Number(document.getElementById("heat").value)
            for (w = 1; w<=width; w++){
                var rand = Math.floor(Math.random() * 101);
                pixel[height][w].style.backgroundColor = "rgb("+ (rand+heat) +", "+(rand+heat-41)+", 0)"
            }
        }, 100)


    </script>
</body>
</html>