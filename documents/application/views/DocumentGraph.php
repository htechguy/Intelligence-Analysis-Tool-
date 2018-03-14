<?php
$page = "DocumentGraph";
include('_Header.php');
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return str_replace('-', ' ', $string);
}
?>
<div class="container">

  <div style="width: 100%;">
    <div class="legend">
        Most frequently appeared people and places are larger and slightly faded in color.  Less common words are smaller and darker.
    </div>

</div>

  <?php
$jarent = array();
$data = array();
$dates = array();
   foreach($documents as $document) {
$content = $document['content'];

$replaces = array("St.",",","  "," al ","Report Date"," bin ",":-----","]","University of","FBI");
$to = array("St",", "," "," Al ",""," Bin ",".","","University Of","");
$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
$ar = explode(" ",str_replace($replaces,$to,$content));

preg_match_all ("/\d{1,2}\s+(Jan(uary)?|Feb(ruary)?|Mar(ch)?|Apr(il)?|May|Jun(e)?|Jul(y)?|Aug(ust)?|Sep(tember)?|Oct(ober)?|Nov(ember)?|Dec(ember)?)[,.\s]+\d{4}/", $content, $array);

$darray=array();
foreach($array[0] as $moh){

  $dates[]= $moh;
  $darray[]= $moh;
}


$x = "";
foreach($ar as $k=>$a){

  if(ctype_upper($a[0])){
$x .=" ".$a;
if(!ctype_upper($ar[$k+1][0]) ){
 if(  strpos($x, '.') !==false){
  $x =  substr($x, 0, strpos($x, '.'));
}
$last = $ar[$k-str_word_count($x)];

  if (trim($x)!="" && $last[strlen($last)-1]!="." && strlen($x)>2){
    if($x[strlen($x)-1]==",")
    $x = substr($x, 0, (strlen($x)-1));
    if (!in_array(trim($x),$months)){
     //echo "<b>".trim(($x))."</b><br>";

    $data[]= trim($x);
    $darray[]= trim($x);

   }
}
 $x="";
 }


  }

}

$x = "";
$jarent []= array_pad(array_unique($darray), 20, "");
$darray = array();
}
fclose($fp);

$result = array_count_values($data);
arsort($result);
$desult = array_count_values($dates);
$final = array();
$kinal = array();
$linal = array();
function sortFunction( $a, $b ) {
    return strtotime($a["date"]) - strtotime($b["date"]);
}
foreach($desult as $j=>$ris){
  $myDateTime = DateTime::createFromFormat('d M, Y', str_replace('.',',',$j));
  $newDateString = $myDateTime->format('d-m-Y');

  $linal[]= array(

    "text"=>$newDateString,
    "size"=>$ris*15

  );

}

usort($linal, "sortFunction");



foreach($result as $k=>$res){

$final[]= array(

  "text"=>$k,
  "size"=>$res*15

);

$kinal[]= array(

  "word"=>$k,
  "count"=>$res

);

}
?>

<style>
    body {
        font-family:"Lucida Grande","Droid Sans",Arial,Helvetica,sans-serif;
    }
    .legend {
        border: 1px solid #555555;
        border-radius: 5px 5px 5px 5px;
        font-size: 0.8em;
        margin: 10px;
        padding: 8px;
    }
    .bld {
        font-weight: bold;
    }
    body{
      overflow-x:hidden;
    }
    .node {
      cursor: pointer;
    }

    .node circle {
      fill: #fff;
      stroke: steelblue;
      stroke-width: 1.5px;
    }

    .node text {
      font: 10px sans-serif;
    }

    .link {
      fill: none;
      stroke: #ccc;
      stroke-width: 1.5px;
    }
</style>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="<?=PATH?>js/d3.layout.cloud.js"></script>
<script>
/* Dates */


var frequency_list = <?php echo json_encode($linal); ?>;

  var color = d3.scale.linear()
          .domain([0,1,2,3,4,5,6,10,15,20,100])
          .range(["#ddd", "#ccc", "#bbb", "#aaa", "#999", "#888", "#777", "#666", "#555", "#444", "#333", "#222"]);

  d3.layout.cloud().size([1550, 650])
          .words(frequency_list)
          .rotate(0)
          .fontSize(function(d) { return d.size; })
          .on("end", draw)
          .start();

  function draw(words) {
      d3.select("body").append("svg")
              .attr("width", 1600)
              .attr("height", 400)
              .attr("class", "wordcloud")
              .append("g")
              // without the transform, words words would get cutoff to the left and top, they would
              // appear outside of the SVG area
              .attr("transform", "translate(320,200)")
              .selectAll("text")
              .data(words)
              .enter().append("text")
              .style("font-size", function(d) { return d.size + "px"; })
              .style("fill", function(d, i) { return color(i); })
              .attr("transform", function(d) {
                  return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
              })
              .text(function(d) { return d.text; });
  }



/* Words and places start */
    var frequency_list = <?php echo json_encode($final); ?>;

    var color = d3.scale.linear()
            .domain([0,1,2,3,4,5,6,10,15,20,100])
            .range(["#ddd", "#ccc", "#bbb", "#aaa", "#999", "#888", "#777", "#666", "#555", "#444", "#333", "#222"]);

    d3.layout.cloud().size([1550, 650])
            .words(frequency_list)
            .rotate(0)
            .fontSize(function(d) { return d.size; })
            .on("end", draw)
            .start();

    function draw(words) {
        d3.select("body").append("svg")
                .attr("width", 1600)
                .attr("height", 400)
                .attr("class", "wordcloud")
                .append("g")
                // without the transform, words words would get cutoff to the left and top, they would
                // appear outside of the SVG area
                .attr("transform", "translate(620,200)")
                .selectAll("text")
                .data(words)
                .enter().append("text")
                .style("font-size", function(d) { return d.size + "px"; })
                .style("fill", function(d, i) { return color(i); })
                .attr("transform", function(d) {
                    return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                })
                .text(function(d) { return d.text; });
    }


    var margin = {
      top: 20,
      right: 120,
      bottom: 20,
      left: 120
    },
      width = 800 - margin.right - margin.left,
      height = <?php echo count($kinal)*20 ?> - margin.top - margin.bottom;

    var canvas = d3.select("body").append("svg")
      .attr("width", 2000)
      .attr("height", height + margin.top + margin.bottom)
      .append("g")
      .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    var tree = d3.layout.tree()
      .size([height, width])
      .children(function(d){
          return d.values;
        });

    var diagonal = d3.svg.diagonal()
      .projection(function(d) {
        return [d.y, d.x];
      });

    var data = <?php echo json_encode($jarent); ?>;

      var nested_data = d3.nest()
        .key(function(d) {
          return d['1'];
        })
        .key(function(d) {
          return d['2'];
        })
        .rollup(function(d){
          var children = [];
          d.forEach(function(dSub){
            for (var k in dSub){
              if (k!="1" && k!="2" && dSub[k]!="")
                children.push({'key': dSub[k]})
              }
          })
          return children;
        })
        .entries(data);

      console.log(nested_data)

      flare_data = {};
      flare_data.key = "Case Links";
      flare_data.values = nested_data;
      //flare_data = reSortFlare(flare_data); //Turns Key Values into Name Children which D3 Tree expects

      console.log(flare_data)

      var nodes = tree.nodes(flare_data);

      var link = canvas.selectAll(".link")
        .data(tree.links(nodes))
        .enter().append("path")
        .attr("class", "link")
        .attr("d", diagonal);

      var node = canvas.selectAll(".node")
        .data(nodes)
        .enter()
        .append("g")
        .attr("class", "node")
        .attr("transform", function(d) {
          return "translate(" + d.y + "," + d.x + ")";
        });

      node.append("circle")
        .attr("r", 7);

      node.append("text")
        .attr("dx", function(d) {
          return d.children ? -15 : 15;
        })
        .attr("dy", 3)
        .style("text-anchor", function(d) {
          return d.children ? "end" : "start";
        })
        .text(function(d) {
          return d.children ? d.key : d.key;
        });




    hashCode = function(str){
    var hash = 0;
    if (str.length == 0) return hash;
    for (i = 0; i < str.length; i++) {
        char = str.charCodeAt(i);
        hash = ((hash<<5)-hash)+char;
        hash = hash & hash; // Convert to 32bit integer
    }
    return hash;
}

colorfn = function(d) { return d3.hsl(hashCode(d.word) % 360, 0.5, 0.5) };

var width = 960,
    height = <?php echo count($kinal)*47; ?>;

xlog = d3.scale.log();
xlog.domain([1, 100]);
xlog.range([200, width - 20]);
x = function(x) { if (x == 0) { return 200; } else { return 200 + xlog(x); } };

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(32, 132)");

function update(data)
{
  // TEXT

  var text = svg.selectAll("text")
              .data(data, function(d) {return d.word;});

  // update
  text
   .transition()
     .duration(750)
     .attr("y", function(d, i) { return i * 45; })
     .style("fill-opacity", 1);

  // enter
  text.enter().append("text")
      .style("fill-opacity", 1e-6)
      .style("fill", colorfn)
      .attr("y", height)
      .attr("x", 32)
      .text(function(d) { return d.word; })
   .transition()
      .duration(750)
      .style("fill-opacity", 1)
      .attr("y", function(d, i) { return i * 45; });

  // exit
  text.exit()
   .transition()
     .duration(750)
     .style("fill-opacity", 1e-6)
     .attr("y", height)
     .remove();

  // LINES

  var line = svg.selectAll(".bar")
               .data(data, function(d) {return d.word; });

  // update
  line
    .transition()
    .duration(750)
    .attr("x2", function(d) { return x(d.count) })
    .attr("y1", function(d, i) { return i * 45 - 15; })
    .attr("y2", function(d, i) { return i * 45 - 15; })
    .style("stroke-opacity", "1");

  // enter
  line.enter().append("line")
    .attr("class", "bar")
    .attr("y1", height)
    .attr("y2", height)
    .attr("x1", x(0))
    .attr("x2", function(d) { return x(d.count); })
    .style("stroke-width", "10")
    .style("stroke", colorfn)
    .style("stroke-opacity", 1e-6)
   .transition()
    .duration(750)
    .attr("y1", function(d, i) { return i * 45 - 15; })
    .attr("y2", function(d, i) { return i * 45 - 15; })
    .style("stroke-opacity", 1);

  // exit
  line.exit()
    .transition()
    .duration(750)
    .attr("y1", height)
    .attr("y2", height)
    .style("stroke-opacity", "0");

  // TICKS

  var tick = svg.selectAll(".tick")
               .data(xlog.ticks());

  // enter
  tick.enter().append("line")
    .attr("class", "tick")
    .attr("x1", x)
    .attr("x2", x)
    .attr("y1", -100)
    .attr("y2", height)
    .style("stroke-width", 3)
    .style("stroke", "rgb(255,255,255)");
}

var test = [<?php echo json_encode($kinal); ?>];

var counter = 0;

window.focus();
d3.select(window).on("keydown", function() {
  switch (d3.event.keyCode) {
    case 37: counter--; break;
    case 39: counter++; break;
  }
  counter = ((counter % test.length) + test.length) % test.length;
  update(test[counter]);
});

update(test[counter]);

</script>


</div>

<?php
include('_Footer.php');
 ?>