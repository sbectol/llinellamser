<!DOCTYPE HTML>

<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta charset="UTF-8">
    <style>
    * { margin:0; padding:0; }
	  html, body { width:100%; height:100%; }
	body {overflow: hidden;}
	  canvas { display:block; }
	  #videomyvid {position:absolute;
	  top:-359px;
	  left:-639px;
		}
    </style>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	{{-- <script type="text/javascript" src="//use.typekit.net/oas3hhd.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script> --}}
    <link rel="stylesheet" href="https://use.typekit.net/jgh4hoy.css">
  </head>
  <body>

	<style>
	.fonta {
	visibility: hidden;
    position: absolute;
	height:0;
    font-family: 'FontAwesome';
    }
	.fontb {
	visibility: hidden;
    position: absolute;
	height:0;
	font-family: 'alternate-gothic-no-1-d';
	}
	.fontc {
	visibility: hidden;
    position: absolute;
	height:0;
	font-family: 'john-doe';
	}
	.fontd {
	visibility: hidden;
    position: absolute;
	height:0;
	font-family: 'adobe-caslon-pro';
	}
</style>



    <div id="container">
	</div>
	<span class="fonta">&nbsp;</span>
	<span class="fontb">&nbsp;</span>
	<span class="fontc">&nbsp;</span>
	<span class="fontd">&nbsp;</span>
    <script src="js/kinetic-v5.0.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



    <script defer="defer">
function myevent(id, date, title, title_cym, asset,asset_cym, width, height, asset_type, major ,year, quote, credit, image, nobg) {
	this.id = id;
	this.date = date;
	this.title = title;
	this.title_cym = title_cym;
	this.asset = asset;
	this.asset_cym = asset_cym;
	this.width = width;
	this.height = height;
	this.asset_type = asset_type;
	this.major = major;
	this.year = year;
	this.quote = quote;
	this.credit = credit;
	this.image = image;
	this.nobg = nobg;
}
var myevents = new Array;
<?php
$phone=0;
setlocale(LC_TIME, 'cy_GB');
// $mysqli = new mysqli("localhost", "root", "dime88", "timeline");
// $result = $mysqli->query("SET NAMES utf8;");
$result = $timeline;
echo('var count='.$result->count().';');
?>
@foreach($result as $row)
    @php
        $width = 0;
        $height = 0;
        $pos = strpos($row['image'], ".jpg");
    @endphp
    @if($pos === false)
    @else
    @php
    list($width, $height) = getimagesize($row->image);
    @endphp

    @endif

   myevents.push(new myevent({{$row->id}},{{$row->dyddiad}},"{{$row->title}}","{{$row->title_cym}}","{{$row->asset}}","{{$row->asset_cym}}","{{$width}}","{{$height}}","{{$row->asset_type}}","{{$row->major_event}}","{{$row->dyddiad}}","{{$row->quote}}","{{$row->credit}}","{{$row->image}}","{{$row->nobg}}"));

@endforeach


var lang = "Cymraeg"
var vid = "myvid"
var vw = 640
var vh = 360
var vsrc = ""
$('body').append('<div id="video' + vid + '" class="offscreen"></div>');
var vidobj = '<video controls width="' + vw + '" height="' + vh + ' preload="auto"></video>';
$('#video' + vid).html(vidobj);
$('body').append('<div id="audioplayer" class="offscreen"></div>');
var audobj = '<audio preload="auto"></audio>';
$('#audioplayer').html(audobj);
var w = window.innerWidth;
var h = window.innerHeight;
var unit =(Math.max(w/h,h/w) * Math.max(w,h)) / 100
console.log(unit)
unit = 20
//change unit based on screen size etc
if (w>1600 || h> 900) { 
	unit=30
	}
if (w <= 640) {
	unit = 10
	}
function preloadImages(srcs, imgs, callback) {
	var img;
	var remaining = srcs.length;
	var ileft = 0
		for (var i = 0; i < srcs.length; i++) {
			img = new Image();
			img.onload = function () {
				loaderText.setText("llwytho " + ileft + "/" + srcs.length);
				loaderText.offsetX(loaderText.width() / 2);
				loaderLayer.draw();
				//console.log("llwytho " + ileft + "/" + srcs.length);
				--remaining;
				++ileft;
				if (remaining <= 0) {
					callback();
				}
			};
			img.src = srcs[i];
			imgs.push(img);

		}
}
var images = [];
var srcs = [];
var quotes = [];
var author = [];
for (j = 0; j < count; j++) {
	if (myevents[j].image != '' ) {
		srcs.push(myevents[j].image);
		}
	if(myevents[j].quote != '' && myevents[j].asset_type == "text")  {
		quotes.push(myevents[j].quote);
		}
	if(myevents[j].quote != '' && myevents[j].asset_type == "text")  {
		author.push(myevents[j].title);
		}
}
for (i = 0; i < author.length; i++) {
	console.log(i,author[i])
	}
var phone=0;
phone=<?php echo($phone); ?>;
window.onresize = function (event) {
	if(phone != 1) {
	location.replace(location.href);
	}
}



function first_image() {
	for (var i = 0; i < myevents.length; i++) {
		if (myevents[i].asset_type == 'image') {
			return i;
		}
	}
}
function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {
	var ratio = [maxWidth / srcWidth, maxHeight / srcHeight];
	ratio = Math.min(ratio[0], ratio[1]);
	return {
		x : srcWidth * ratio,
		y : srcHeight * ratio
	};
}
var maxDate=myevents[count-1].year
var minDate=myevents[0].year

var currentPos = 0
var startyear = minDate*1;
var endyear = maxDate*1;
var lastYear
var yearMarker = new Array
var toggle_zoom = false
var currentId = first_image()
var newx
var newy
var max_width = window.innerWidth;
var max_height = window.innerHeight;
var src_width = myevents[first_image()].width
var src_height = myevents[first_image()].height
var crop_height
var crop_width
var x_offset
var y_offset
var dst_width = max_width
var dst_height = max_height

function fit_to_window(src_width, src_height, max_width, max_height) {
	var src_ratio = src_width / src_height
		var dst_ratio = dst_width / dst_height
		if (dst_ratio < src_ratio) {
			crop_height = src_height
				crop_width = crop_height * dst_ratio
				x_offset = (src_width - crop_width) / 2
				y_offset = 0
		} else {
			crop_width = src_width
				crop_height = crop_width / dst_ratio
				x_offset = 0
				y_offset = (src_height - crop_height) / 3
		}
	return {
		x : x_offset,
		y : y_offset,
		width : crop_width,
		height : crop_height
	}
}

var stage = new Kinetic.Stage({
		container : 'container',
		width : window.innerWidth,
		height : window.innerHeight,

	});
var bglayer = new Kinetic.Layer();
var layer = new Kinetic.Layer({
		name : "line",
		draggable : true,
		dragBoundFunc : function (pos) {
			if (w>=h  ) {
			return {
				x : pos.x,
				y : this.getAbsolutePosition().y
			}
			} else {
			return {
				x : this.getAbsolutePosition().x,
				y : pos.y
			}
			}
		}
	});
var bg;
var loaderLayer = new Kinetic.Layer()
var loader
var loaderDummy
var loaderTitle
var loaderYears
var loaderQuote
var loaderAuthor
var Cymraeg
var English
var loaderText  = new Kinetic.Text({
		x : w / 2,
		y : h - h / 10,
		text : "llwytho...",
		fontSize : unit,
		fontFamily : '"alternate-gothic-no-1-d",impact,sans-serif',
		fill : 'black'
	});

window.onload = function () {

	 loader = new Kinetic.Line({
		x : 0,
		y : 0,
		points : [0, 0, w, 0, w, h, 0, h],
		closed : true,
		fill : "white",
		opacity : 0.5
	});

loaderTitle = new Kinetic.Text({
		x : w / 2,
		y : h / 6,
		text : "Llinell Amser Llanrwst",
		fontSize : 3 * unit,
		fontFamily : '"alternate-gothic-no-1-d",impact,sans-serif',
		fill : 'grey'

	});


var quoteno = Math.round(Math.random() * (quotes.length-1) );
 loaderYears = new Kinetic.Text({
		x : w / 2,
		y : h / 6 + loaderTitle.getHeight(),
		text : "",
		fontSize : unit,
		fontFamily : '"alternate-gothic-no-1-d",impact,sans-serif',
		fill : 'green'

	});
 loaderQuote = new Kinetic.Text({
		x : w / 2,
		y : h / 6 + loaderTitle.getHeight() + loaderYears.getHeight() + h/25,
		width: w/2,
		text : '"' + quotes[quoteno] + '"',
		fontSize : 1.5 * unit,
		fontFamily : '"john-doe", Courier',
		fill : 'black'
	});
loaderAuthor =  new Kinetic.Text({
		x : w / 2 + w /4,
		y : h / 6 + loaderTitle.getHeight() + loaderYears.getHeight() + loaderQuote.getHeight() + h/20,
		width: w/2,
		text : '"' + author[quoteno] + '"',
		fontSize : 1.5 * unit,
		fontFamily : '"adobe-caslon-pro",serif',
		fill : 'grey'
	});


loaderText.offsetX(loaderText.width() / 2);
loaderTitle.offsetX(loaderTitle.width() / 2);
loaderYears.offsetX(loaderYears.width() / 2);
loaderQuote.offsetX(loaderQuote.width() / 2);
loaderAuthor.offsetX(loaderAuthor.width() / 2);
// English.offsetX(English.width()/2);
// Cymraeg.offsetX(Cymraeg.width()/2);
loaderLayer.add(loader);

loaderLayer.add(loaderText);
loaderLayer.add(loaderTitle);
// loaderLayer.add(Cymraeg);
// loaderLayer.add(English);

//loaderLayer.add(loaderYears);
//loaderLayer.add(loaderQuote);
//loaderLayer.add(loaderAuthor);
stage.add(loaderLayer);
loaderLayer.draw();
}
preloadImages(srcs, images, loadedImages);
function loadedImages() {
	var tween = new Kinetic.Tween({
        node: loaderLayer,
        duration: 3,
        opacity: 0,
	});
	setTimeout(function() {
        tween.play();
      }, 4000);
	setTimeout('startShow()', 7000);
}
function startShow() {


	var start_line = 6 * unit;
	var linelength = 10 * unit;
	var current_pos = start_line;
	var imageObj = new Image();
	imageObj = images[first_image()];
	bg = new Kinetic.Image({
			x : 0,
			y : 0,
			image : imageObj,
			name : 'bg',
			crop : fit_to_window(myevents[currentId].width, myevents[currentId].height, w, h),
			width : w,
			height : h,
			blurRadius : 16
		});

	bg.cache();
	bg.filters([Kinetic.Filters.Blur]);
	bglayer.add(bg);
	bglayer.draw();
	stage.add(bglayer);
	stage.draw();

	function moveTimeline(moveto, time, ease) {
		if(w>=h  ) {
			var tween = new Kinetic.Tween({
				node : layer,
				duration : time,
				x : -moveto + start_line,
				easing: ease
			});
			} else {
			var tween = new Kinetic.Tween({
				node : layer,
				duration : time,
				y : -moveto + start_line,
				easing: ease
			});

			}
		tween.play();
		currentPos = moveto;
		highlightyears();
	};
	if (w>=h  ) {
	var dragback = new Kinetic.Line({
		points:[0,2*unit,(count*10*unit)+(10*unit),2*unit,(count*10*unit)+(10*unit),h,0,h],
		fill : 'black',
		opacity : 0.01,
		closed : true
		});


	} else {
	var dragback = new Kinetic.Line({
		points:[0,2*unit,w,2*unit,w,(count*10*unit)+(10*unit),0,(count*10*unit)+(10*unit)],
		fill : 'black',
		opacity : 0.01,
		closed : true
		});
	}
	layer.add(dragback);
	if (w>=h   ) {
		var circle = new Kinetic.Circle({
				x : start_line,
				y : h / 2,
				radius : 2.2 * unit,
				stroke : 'green',
				strokeWidth : 0.35 * unit
			});
		var dot = new Kinetic.Circle({
				x : start_line,
				y : h / 2,
				radius : 1.1 * unit,
				fill : 'green',
				stroke : 'green',
				strokeWidth : 0.35 * unit
			});
		} else {
		var circle = new Kinetic.Circle({
				x : w / 2,
				y : start_line,
				radius : 2.2 * unit,
				stroke : 'green',
				strokeWidth : 0.35 * unit
			});
		var dot = new Kinetic.Circle({
				x : w / 2,
				y : start_line,
				radius : 1.1 * unit,
				fill : 'green',
				stroke : 'green',
				strokeWidth : 0.35 * unit
			});
		}
	layer.add(circle);
	layer.add(dot);
	for (var i = 0; i < count; i++) {
		var linepoints
		if (w>=h   ) {
			linepoints = [current_pos + (2.2 * unit), h / 2, current_pos + (2.2 * unit) + linelength, h / 2]
			} else {
			linepoints = [ w / 2, current_pos + (2.2 * unit), w / 2, current_pos + (2.2 * unit) + linelength]
			}
		var redLine = new Kinetic.Line({
				points : linepoints,
				stroke : 'green',
				strokeWidth : 0.35 * unit,
				lineCap : 'round',
				lineJoin : 'round'
			});
		redLine.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
		redLine.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });

		layer.add(redLine);
		var currentDate = myevents[i].date
		var currentYear = myevents[i].date
		var dateX
		var dateY
		var yearOffset
		if (w>=h   ) {
			dateX = current_pos + (2 * unit) + linelength
			dateY = h / 2 + 1.8*unit
			if (i % 2 == 1) {
				dateY = h /2 - 1.5*unit
				}
			} else {
			dateX = w / 2 + 3.8*unit
			dateY = current_pos + (2 * unit) + linelength + (0.75*unit)
			if (i % 2 == 1) {
				dateX = w/2 - 3.8*unit
				}
			}
		
		var dateText = new Kinetic.Text({
				x : dateX,
				y : dateY,
				text : currentDate,
				fontSize : unit,
				fontFamily : '"adobe-caslon-pro",serif',
				fill : 'white'
			});
		dateText.offsetX(dateText.width() / 2);
		dateText.offsetY(dateText.height() / 2);
		
		if (w>h){
			fontsize=2*unit
		
			if (i % 2 == 1) {
			dateY = dateY - 2.5 * unit
			} else {
			dateY = dateY + 2.5 * unit
			}
		}
		else {fontsize=3*unit}
		if (currentYear != lastYear) {
			var yearText = new Kinetic.Text({
					x : dateX ,
					y : dateY ,
					text : currentYear,
					fontSize : fontsize,
					fontFamily : '"alternate-gothic-no-1-d",impact,sans-serif',
					fill : 'white'
				});
			if (w>=h   ) {
			yearMarker[currentYear] = dateX;
			} else {
			yearMarker[currentYear] = dateY;
			}
			lastYear = currentYear;
			yearText.offsetX(yearText.width() / 2);
			yearText.offsetY(yearText.width() / 2);
			layer.add(yearText);
		}
		showmonths=false
		if (showmonths==true) {
			layer.add(dateText);
		}

		if (myevents[i].asset_type == "audtest") {
			var audio_tab = new Kinetic.Group({
			id: i});
			if (w>=h   ) {
				var tipX = current_pos + linelength + 2*unit
				var minX = tipX - 1.5*unit;
				var maxX = tipX + 1.5*unit;
				var minY = h/2 - 6*unit;
				var maxY = h/2 - 3*unit;
				var tipY = maxY + (0.5*unit);
				var tipedge1X = tipX - (0.5*unit);
				var tipedge2X = tipX + (0.5*unit);
				var points = [tipX, tipY,
					tipedge1X, maxY,
					minX, maxY,
					minX, minY,
					maxX, minY,
					maxX, maxY,
					tipedge2X, maxY
				];

				var tipYinvert
				var minYinvert
				var maxYinvert
				if (i % 2 == 1) {
					tipYinvert = (h / 2) + ((h / 2) - tipY)
					minYinvert = (h / 2) + ((h / 2) - minY)
					maxYinvert = (h / 2) + ((h / 2) - maxY)
					points = [tipX, tipYinvert,
						tipedge1X, maxYinvert,
						minX, maxYinvert,
						minX, minYinvert,
						maxX, minYinvert,
						maxX, maxYinvert,
						tipedge2X, maxYinvert
					];
				}
			} else {

			var tipY = current_pos + linelength + 2*unit;
			var minX = w / 2 - 6*unit;
			var maxX = w / 2 - 3*unit;
			var maxY = tipY + 1.5*unit
			var minY = tipY - 1.5*unit
			var tipX = maxX + (0.5*unit);
			var tipedge1Y = tipY - (0.5*unit);
			var tipedge2Y = tipY + (0.5*unit);
			var points = [tipX, tipY,
					maxX, tipedge1Y,
					maxX, minY,
					minX, minY,
					minX, maxY,
					maxX, maxY,
					maxX, tipedge2Y
				];
			if (i % 2 == 1) {
				tipXinvert = (w / 2) + ((w / 2) - tipX)
				minXinvert = (w / 2) + ((w / 2) - minX)
				maxXinvert = (w / 2) + ((w / 2) - maxX)


				points = [ tipXinvert,tipY,
						 maxXinvert,tipedge1Y,
						 maxXinvert,minY,
						 minXinvert,minY,
						 minXinvert,maxY,
						 maxXinvert,maxY,
						 maxXinvert,tipedge2Y
					];

			}

			}

			var audio_tab_back = new Kinetic.Line({
					points : points,
					id : i,
					fill : 'white',
					closed : true
				});
			// add the shape to the group
			audio_tab.add(audio_tab_back);
			//add icon on audio tab
			var yPos
			var xPos
			if(w>=h   ) {
				xPos = minX
				var ajustx=0.7*unit;
				var ajusty=0.6*unit;
				if (i % 2 == 1) {
					yPos = maxYinvert
				} else {
					yPos = minY
				}
				} else {
				yPos = minY
				var ajustx=0.6*unit;
				var ajusty=0.7*unit;
				if (i % 2 == 1) {
					xPos = maxXinvert
				} else {
					xPos = minX
				}
			}

			var audio_icon = new Kinetic.Text({
					x : xPos + ajustx,
					y : yPos + ajusty,
					text : '\uf028',
					fill : 'grey',
					fontFamily : 'FontAwesome',
					fontSize : 1.8*unit
				});
			audio_tab.add(audio_icon);
			layer.add(audio_tab);
			audio_tab.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
			audio_tab.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
			audio_tab.on('mousedown touchstart', function() {
				zoom_it(this);
				});
			}
		if (myevents[i].asset_type == "text") {
			var text_tab = new Kinetic.Group({
			id:i});

			if (w>=h   ) {
				var tipX = current_pos + linelength + 2*unit
				var minX = tipX - 1.5*unit;
				var maxX = tipX + 1.5*unit;
				var minY = h/2 - 6*unit;
				var maxY = h/2 - 3*unit;
				var tipY = maxY + (0.5*unit);
				var tipedge1X = tipX - (0.5*unit);
				var tipedge2X = tipX + (0.5*unit);
				var points = [tipX, tipY,
					tipedge1X, maxY,
					minX, maxY,
					minX, minY,
					maxX, minY,
					maxX, maxY,
					tipedge2X, maxY
				];
				var imageY = ((minY + (maxY - minY) / 2) - imageheight / 2) + 0.2*unit;
				var imageX = ((minX + (maxX - minX) / 2) - imagewidth / 2) + 0.2*unit;
				var tipYinvert
				var minYinvert
				var maxYinvert
				if (i % 2 == 1) {
					tipYinvert = (h / 2) + ((h / 2) - tipY)
					minYinvert = (h / 2) + ((h / 2) - minY)
					maxYinvert = (h / 2) + ((h / 2) - maxY)
					points = [tipX, tipYinvert,
						tipedge1X, maxYinvert,
						minX, maxYinvert,
						minX, minYinvert,
						maxX, minYinvert,
						maxX, maxYinvert,
						tipedge2X, maxYinvert
					];
				}
			} else {
			var tipY = current_pos + linelength + 2*unit;
			var minX = w / 2 - 6*unit;
			var maxX = w / 2 - 3*unit;
			var maxY = tipY + 1.5*unit
			var minY = tipY - 1.5*unit
			var tipX = maxX + (0.5*unit);
			var tipedge1Y = tipY - (0.5*unit);
			var tipedge2Y = tipY + (0.5*unit);
			var points = [tipX, tipY,
					maxX, tipedge1Y,
					maxX, minY,
					minX, minY,
					minX, maxY,
					maxX, maxY,
					maxX, tipedge2Y
				];
			if (i % 2 == 1) {
				tipXinvert = (w / 2) + ((w / 2) - tipX)
				minXinvert = (w / 2) + ((w / 2) - minX)
				maxXinvert = (w / 2) + ((w / 2) - maxX)


				points = [ tipXinvert,tipY,
						 maxXinvert,tipedge1Y,
						 maxXinvert,minY,
						 minXinvert,minY,
						 minXinvert,maxY,
						 maxXinvert,maxY,
						 maxXinvert,tipedge2Y
					];

			}

			}

			var text_tab_back = new Kinetic.Line({
					points : points,
					id : i,
					fill : 'white',
					closed : true
				});
			// add the shape to the group
			text_tab.add(text_tab_back);
			//add icon on text tab
			if(w>=h) {
				xPos = minX
				var ajustx=0.7*unit;
				var ajusty=0.6*unit;
				if (i % 2 == 1) {
					yPos = maxYinvert
				} else {
					yPos = minY
				}
				} else {
				yPos = minY
				var ajustx=0.6*unit;
				var ajusty=0.7*unit;
				if (i % 2 == 1) {
					xPos = maxXinvert
				} else {
					xPos = minX
				}
			}

			var letter_icon = new Kinetic.Text({
					x : xPos + ajustx,
					y : yPos + ajusty,
					text : '\uf075',
					fill : 'grey',
					fontFamily : 'FontAwesome',
					fontStyle: 'bold',
					fontSize : 1.7*unit
				});
			text_tab.add(letter_icon);

			layer.add(text_tab);
			text_tab.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
			text_tab.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
			text_tab.on('mousedown touchstart', function () {

				//writeMessage(this.getId());
				zoom_it(this);

			});
		}
		if (myevents[i].asset_type == "image" || myevents[i].asset_type == "video" || myevents[i].asset_type =="audio" ) {

			if(w>=h   ){
				var imagewidth = calculateAspectRatioFit(myevents[i].width, myevents[i].height, 8*unit, h/4).x
				var imageheight = calculateAspectRatioFit(myevents[i].width, myevents[i].height, 8*unit, h/4).y
				var tipX = current_pos + linelength + 2*unit;

				var minX = tipX - imagewidth / 2;
				var maxX = tipX + imagewidth / 2;
				var minY = h/2 - 3*unit - imageheight;
				var maxY = h/2 - 3*unit;

				var tipY = maxY + (0.5*unit);
				var tipedge1X = tipX - (0.5*unit);
				var tipedge2X = tipX + (0.5*unit);
				var points = [tipX, tipY,
					tipedge1X, maxY,
					minX, maxY,
					minX, minY,
					maxX, minY,
					maxX, maxY,
					tipedge2X, maxY
				];
				var imageY = ((minY + (maxY - minY) / 2) - imageheight / 2) + 0.2*unit;
				var imageX = ((minX + (maxX - minX) / 2) - imagewidth / 2) + 0.2*unit;
				var tipYinvert
				var minYinvert
				var maxYinvert
				if (i % 2 == 1) {
					tipYinvert = (h / 2) + ((h / 2) - tipY)
					minYinvert = (h / 2) + ((h / 2) - minY)
					maxYinvert = (h / 2) + ((h / 2) - maxY)
					points = [tipX, tipYinvert,
						tipedge1X, maxYinvert,
						minX, maxYinvert,
						minX, minYinvert,
						maxX, minYinvert,
						maxX, maxYinvert,
						tipedge2X, maxYinvert
					];
					imageY = ((minYinvert + (maxYinvert - minYinvert) / 2) - imageheight / 2) + 0.2*unit;
				}
			} else {
				var imagewidth = calculateAspectRatioFit(myevents[i].width, myevents[i].height, w/4, 12*unit).x
				var imageheight = calculateAspectRatioFit(myevents[i].width, myevents[i].height, w/4, 12*unit).y
				var tipY = current_pos + linelength + 2*unit;
				var minY = tipY - imageheight / 2;
				var maxY = tipY + imageheight / 2;
				var minX = w/2 - 3*unit - imagewidth;
				var maxX = w/2 - 3*unit;

				var tipX = maxX + (0.5*unit);
				var tipedge1Y = tipY - (0.5*unit);
				var tipedge2Y = tipY + (0.5*unit);

				var points = [tipX, tipY,
					maxX, tipedge1Y,
					maxX, maxY,
					minX, maxY,
					minX, minY,
					maxX, minY,
					maxX,tipedge2Y
				];
				var imageY = ((minY + (maxY - minY) / 2) - imageheight / 2) + 0.2*unit;;
				var imageX = ((minX + (maxX - minX) / 2) - imagewidth / 2) + 0.2*unit;;
				var tipXinvert
				var minXinvert
				var maxXinvert
				if (i % 2 == 1) {
					tipXinvert = (w / 2) + ((w / 2) - tipX)
					minXinvert = (w / 2) + ((w / 2) - minX)
					maxXinvert = (w / 2) + ((w / 2) - maxX)
					points = [tipXinvert, tipY,
						maxXinvert, tipedge1Y,
						maxXinvert, maxY,
						minXinvert, maxY,
						minXinvert, minY,
						maxXinvert, minY,
						maxXinvert, tipedge2Y
					];
					imageX = ((minXinvert + (maxXinvert - minXinvert) / 2) - imagewidth / 2) + 0.2*unit
				}

			}

			//draw a white box and put a thumbnail of the image in it
			var image_holder = new Kinetic.Line({
					points : points,
					id : i,
					fill : 'white',
					closed : true
				});

			layer.add(image_holder);

			var eventImage = new Image();
			//console.log("hello", myevents[i].asset.replace(".mp4", ".jpg"));
			//eventImage.src = myevents[i].asset.replace(".mp4", ".jpg");


			eventImage.src =  myevents[i].image;
			var vid_group = new Kinetic.Group({
			id : i});
			var eImage = new Kinetic.Image({
					x : imageX,
					y : imageY,
					name : "eImage",
					image : eventImage,
					width : imagewidth - 0.4*unit,
					height : imageheight - 0.4*unit,
					id : i,

				});
			vid_group.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
			vid_group.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
			vid_group.add(eImage);
			//layer.add(eImage);
			layer.add(vid_group);

			if (myevents[i].asset_type == 'video') {
			var play_button = new Kinetic.Text({
			x : imageX + imagewidth /2,
			y : imageY + imageheight /2,
			fontFamily: 'FontAwesome',
			text: '\uf01d',
			fill : 'green',
			fontSize : 1.8*unit,
			opacity : 0.8


			});
			play_button.offsetX(play_button.width() / 2)
			play_button.offsetY(play_button.height() / 2)
			vid_group.add(play_button);

			}
			layer.draw();

			if (myevents[i].asset_type == 'audio') {
				var audio_icon = new Kinetic.Text({
					x : imageX + imagewidth /2,
					y : imageY + imageheight /2,
					text : '\uf028',
					fill : 'green',
					fontFamily : 'FontAwesome',
					fontSize : 1.8*unit,
					opacity: 0.8
				});

				audio_icon.offsetX(audio_icon.width() / 2)
				audio_icon.offsetY(audio_icon.height() / 2)
				vid_group.add(audio_icon);

			}
			layer.draw();
			

			vid_group.on('mousedown touchstart', function () {
				newx = calculateAspectRatioFit(myevents[this.getId()].width, myevents[this.getId()].height, w, h - h / 3).x
				newy = calculateAspectRatioFit(myevents[this.getId()].width, myevents[this.getId()].height, w, h - h / 3).y
				if (newx > myevents[this.getId()].width) {
					newx = myevents[this.getId()].width;
				}
				if (newy > myevents[this.getId()].height) {
					newy = myevents[this.getId()].height;
				}
				zoom_it(this);

			});

		}
		var dotx
		var doty
		if(w>=h   ){
		dotx = current_pos + (2*unit) + linelength;
		doty = h / 2;

		} else {
		dotx = w / 2;
		doty = current_pos + (2*unit) + linelength;

		}
		if (myevents[i].major == 1) {
			var major_dot = new Kinetic.Circle({
					x : dotx,
					y : doty,
					radius : w / 60,
					fill : 'green',
					stroke : 'green',
					strokeWidth : w / 200
				});
			layer.add(major_dot);
		} else {
			var smallDot = new Kinetic.Circle({
					x : dotx,
					y : doty,
					radius : 0.5*unit,
					fill : 'green',
					stroke : 'green',
					strokeWidth : 0.3*unit,
					id : i
				});

			layer.add(smallDot);

		}
		current_pos = current_pos + linelength

	}
	//end loop



	stage.add(layer);
	layer.draw();

	var forward_button = new Kinetic.Text({
			x : w - 3*unit,
			y : 2*unit,
			text : "\uf138",
			fontSize : 3*unit,
			fontFamily : 'FontAwesome',
			fill : 'green',
			opacity : 0.5
		});
	var back_button = new Kinetic.Text({
			x : unit,
			y : 2*unit,
			text : "\uf137",
			fontSize : 3*unit,
			fontFamily : 'FontAwesome',
			fill : 'green',
			opacity : 0.5
		});
	var	CymraegLink = new Kinetic.Text({
		x : 0,
		y : 2,
		text : "Cymraeg",
		fontSize : 2 * unit,
		fontFamily : '"alternate-gothic-no-1-d",impact,sans-serif',
		fill : 'white',
		visible: false

	});
	var EnglishLink= new Kinetic.Text({
		x : 0,
		y : 2,
		text : "English",
		fontSize : 2 * unit,
		fontFamily : '"alternate-gothic-no-1-d",impact,sans-serif',
		fill : 'white'
		

	});

	EnglishLink.on('mousedown touchstart', function () {
		lang="English";
		this.visible(false);
		CymraegLink.visible(true);
		yearsLayer.draw();
	})
	CymraegLink.on('mousedown touchstart', function () {
		lang="Cymraeg";
		EnglishLink.visible(true);
		CymraegLink.visible(false);
		yearsLayer.draw();

	})
	back_button.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
	back_button.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
	back_button.on('mousedown touchstart', function () {
		moveTimeline(currentPos-w,2,Kinetic.Easings.EaseInOut);
		});
	forward_button.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
	forward_button.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
	forward_button.on('mousedown touchstart', function () {
		moveTimeline(currentPos+w,2,Kinetic.Easings.EaseInOut);
		back_button.visible(true);
		yearsLayer.draw();
		});



	//;
	var yearsLayer = new Kinetic.Layer();

	yearsLayer.add(back_button);
	yearsLayer.add(forward_button);

	yearsLayer.draw();

	var yearsBack = new Kinetic.Line({
			x : 0,
			y : 0,
			points : [0, 0, w, 0, w, 2*unit, 0, 2*unit],
			fill : "black",
			closed : true
		});
	yearsLayer.add(yearsBack);
	yearsLayer.add(EnglishLink);
	yearsLayer.add(CymraegLink);

	var c = 16;
	var u = 2.5*unit//w / (8 * Math.max(w/h,h/w))
	console.log("u",u)
	var textpos = w / 2 - ((c * u) / 2);
	//console.log(textpos);
	if (w>=h   ) {
	var f=(1.5*unit)
	} else {
	var f=(1.5*unit)
	}
	//console.log(f);
	for (j = 6; j <= 21; j=j+1) {
		suffix = "fed";
		switch(j) {
			case(6):
			suffix="ed"
			break;

			case(11):
			suffix="eg"
			break;
			case(13):
			suffix="eg"
			break;
			case(14):
			suffix="eg"
			break;
			case(16):
			suffix="eg"
			break;
			case(17):
			suffix="eg"
			break;
			case(19):
			suffix="eg"
			break;
			case(21):
			suffix="ain"
			break;
		}
		var yearText = new Kinetic.Text({
				name : 'years',
				x : textpos,
				y : 0.2*unit,
				text : j + suffix + " Ganrif",
				fontFamily : '"alternate-gothic-no-1-d",impact,sans-serif',
				fontSize : 0.8*unit,
				fill : 'grey',
				id : j
			});
		yearText.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
		yearText.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
		yearText.on('mousedown touchstart', function () {
		yearsLayer.find('.years').fill('grey')
		this.fill('white');
		yearsLayer.draw();
		moveTimeline(yearMarker[this.getId()-1*100],3,Kinetic.Easings.StrongEaseInOut);
		});
		//yearsLayer.add(yearText);
		textpos = textpos + u;
	}


	stage.add(yearsLayer);
	yearsLayer.draw();



	//calculate width of layer
	var children = layer.getChildren();
	var layerwidth = 0;
	for (var i = 0; i < children.length; i++) {
	 layerwidth = children[i].getAbsolutePosition().x;
	 //console.log(children[i])
	 //console.log(layerwidth);
	}
	layer.setWidth(layerwidth)
	//console.log(layerwidth);
	// layer.setOffset({x:0,y:0})
	// layer.rotate(90);
	// layer.setX(w)
	// layer.setY(0)
	// layer.draw();
	// console.log(layer);
	layer.on('dragend', function () {

		if(w>=h) {
		currentPos=-layer.getPosition().x;
		} else {
		currentPos=-layer.getPosition().y;
		};
		console.log(currentPos,layer.getWidth());
		// if(currentPos >= layer.getWidth()-w/2){
		// forward_button.visible(false);
		// yearsLayer.draw();
		// } else {
		// forward_button.visible(true);
		// yearsLayer.draw();
		// }
		//console.log(currentPos,w/2);
		// if(currentPos <= w/2){
		// back_button.visible(false);
		// yearsLayer.draw();
		// } else {
		// back_button.visible(true);
		// yearsLayer.draw();
		// }

		highlightyears();

	});
	function highlightyears() {
	var yearPoints=[];
	for (j = startyear; j <= endyear; j++) {
	yearPoints.push(yearMarker[j])
	}
	var theyear
	for(i=0;i<=yearPoints.length-1;i++) {
	console.log("we are here",currentPos,yearPoints[i])
	if(currentPos >= yearPoints[i]) {
	theyear = startyear + i
	}
	}
	console.log(theyear)
	yearsLayer.find('.years').fill('grey')
	yearsLayer.find("#"+theyear)[0].fill('white');
	yearsLayer.draw();

	}
	var overlay_layer = new Kinetic.Layer({
			name : 'overlay',
			width : window.innerWidth,
			height : window.innerHeight,
			visible : false
		});

	var holder = new Kinetic.Line({
			points : [0, 0,
				window.innerWidth, 0,
				window.innerWidth, window.innerHeight,
				0, window.innerHeight
			],
			fill : 'black',
			closed : true,
			opacity : 1

		});

	overlay_layer.add(holder);
	var text_box = new Kinetic.Text({
	fill:'white',
	height:h/3,
	y: (h/4)*3,
	fontFamily : '"adobe-caslon-pro",serif',
	fontSize:unit
	});


	overlay_layer.add(text_box);
	var overlay_image = new Image;

	var oImage = new Kinetic.Image({
			image : overlay_image,
			x : 40,
			y : h/20,
			width : 400,
			height : 400,
			draggable : false
		})


	oImage.on('mouseover', function () {
                document.body.style.cursor = 'move';
            });
	oImage.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
	overlay_layer.add(oImage);
	var quote_box = new Kinetic.Text({
	fill:'black',
	y: h/10,
	fontFamily : '"john-doe", Courier',
	fontSize:unit*1.5
	});
	overlay_layer.add(quote_box);
	overlay_layer.draw();

	overlay_layer.on('mousedown touchstart', function () {
		//this.visible(false)
	});

	var close_button = new Kinetic.Text({
			x : w - 3*unit,
			y: h-6*unit,
			text : "\uf057",
			fontSize : 3*unit,
			fontFamily : 'FontAwesome',
			fill : 'green',
			opacity : 0.5

		});

	close_button.offsetX(close_button.width()/2)
	close_button.offsetY(close_button.height()/2)

	overlay_layer.add(close_button);
	close_button.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
	close_button.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
	close_button.on('mousedown touchstart', function () {
		overlay_layer.visible(false);
		var video = $('#video' + vid + ' > video').get(0);
		video.pause();
		var audio = $('#audioplayer > audio').get(0);
		audio.pause();
		oImage.setX(w / 2 - newx / 2)
		oImage.setY(h/20);
	});

	var zoomout_button = new Kinetic.Text({
			x : 3*unit,
			y: h - 6*unit,
			text : "\uf056",
			fontSize : 3*unit,
			fontFamily : 'FontAwesome',
			fill : 'green',
			opacity : 0.5,
			visible: false


		});
	zoomout_button.offsetX(zoomout_button.width()/2)
	zoomout_button.offsetY(zoomout_button.height()/2)

	overlay_layer.add(zoomout_button);
	zoomout_button.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
	zoomout_button.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
	zoomout_button.on('mousedown touchstart', function () {
		oImage.setScale({
			x : newx / myevents[currentId].width,
			y : newy / myevents[currentId].height
		})
		oImage.setX(w / 2 - newx / 2)
		oImage.setY(h/20);
		oImage.draggable(false)
		zoomout_button.visible(false)
		zoomin_button.visible(true)
		text_box.visible(true);
		overlay_layer.draw();
	});

	var zoomin_button = new Kinetic.Text({
			x : 3*unit,
			y: h-6*unit,
			text : "\uf055",
			fontSize : 3*unit,
			fontFamily : 'FontAwesome',
			fill : 'green',
			opacity : 0.5,


		});
	zoomin_button.offsetX(zoomin_button.width()/2)
	zoomin_button.offsetY(zoomin_button.height()/2)
	overlay_layer.add(zoomin_button);
	zoomin_button.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
	zoomin_button.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
	zoomin_button.on('mousedown touchstart', function () {
		// if (myevents[currentId].width> w ) {
		// oImage.setX(0)
		// } else {
		oImage.setX(w/2 - myevents[currentId].width/2)
		console.log(w/2 - myevents[currentId].width/2)
		//}
		oImage.setY(0);

		oImage.setScale({
			x : 1,
			y : 1
		});
		oImage.draggable(true)
		zoomout_button.visible(true);
		zoomin_button.visible(false)
		text_box.visible(false);
		overlay_layer.draw();
	});

	oImage.on('mousedown touchstart', function () {
		if (toggle_zoom == false) {
			//oImage.setScale({x:1,y:1});
			//toggle_zoom = true;
		} else {
			//oImage.setScale({x:newx/myevents[currentId].width,y:newy/myevents[currentId].height})
			//toggle_zoom=false;
		}
		overlay_layer.draw();
	});

	stage.add(overlay_layer);

	function play_audio(asset) {
		var audio = $('#audioplayer > audio').get(0);
		if(lang=="Cymraeg") {
		audio.src = myevents[asset].asset_cym
		} else {
		audio.src = myevents[asset].asset
		}
		audio.load();
		audio.play();
		}
	function zoom_it(asset) {
		newx = calculateAspectRatioFit(myevents[asset.getId()].width, myevents[asset.getId()].height, w, h - h / 3).x
		newy = calculateAspectRatioFit(myevents[asset.getId()].width, myevents[asset.getId()].height, w, h - h / 3).y
		//console.log(asset.getId());
		currentId = asset.getId();
		overlay_layer.visible(true);
		oImage.visible(false)
		zoomin_button.visible(false)
		zoomout_button.visible(false)
		text_box.visible(true)
		text_box.lineHeight(1.3);
		if(lang=="Cymraeg") {
			text_box.setText(myevents[currentId].title_cym + "\n" + myevents[currentId].credit);
		} else {
			text_box.setText(myevents[currentId].title + "\n" + myevents[currentId].credit);
		}
		text_box.setWidth(w * (2/3));
		text_box.setX(w/3 - w/6);
		text_box.setAlign('center');
		text_box.setY(newy + 3*unit)
		if (myevents[asset.getId()].asset_type == "text" ) {
			text_box.setText("");
			if(lang=="Cymraeg") {
				quote_box.setText( myevents[currentId].title_cym );
			} else {
				quote_box.setText( myevents[currentId].title );
			}
		quote_box.setWidth(newx - newx /10);
		quote_box.setX((w / 2 - newx / 2 + newx / 20));
		quote_box.setY(newy /3)
		quote_box.setAlign('center');
		} else {
		quote_box.setText("");
		}



		if (myevents[asset.getId()].asset_type == "audio") {
		play_audio(asset.getId());

		}

		//overlay_image.src = myevents[asset.getId()].asset;
	if (myevents[asset.getId()].asset_type == "video" || myevents[asset.getId()].asset_type == "image" || myevents[asset.getId()].asset_type == "audio" || myevents[asset.getId()].asset_type == "text") {
		oImage.visible(true)
		console.log ("newx" + newx,myevents[asset.getId()].width)
		if (newx<myevents[asset.getId()].width-50) {
		zoomin_button.visible(true)
		}
		zoomout_button.visible(false)
		//oImage.setImage(asset.getImage());
		var myImage=new Image();
		myImage.src =  myevents[asset.getId()].image
		oImage.setImage(myImage);
		oImage.setWidth(myevents[asset.getId()].width)
		oImage.setHeight(myevents[asset.getId()].height)
		oImage.setScale({
			x : newx / myevents[asset.getId()].width,
			y : newy / myevents[asset.getId()].height
		})

		oImage.setX(w / 2 - newx / 2)
		oImage.setY(h/20)
		}
		overlay_layer.draw();
		//oImage.cache();
		if (myevents[asset.getId()].asset_type == "text" || myevents[asset.getId()].asset_type == "audio"	) {
		zoomin_button.visible(false)
		zoomout_button.visible(false)

		}

		if (myevents[asset.getId()].asset_type == "video") {
			var video = $('#video' + vid + ' > video').get(0);
			video.src =  myevents[asset.getId()].asset;
			//addSourceToVideo(video, myevents[asset.getId()].asset , "video/mp4")
			addSourceToVideo(video, myevents[asset.getId()].asset.replace(".mp4", ".ogv") , "video/ogg")
			addSourceToVideo(video, myevents[asset.getId()].asset.replace(".mp4", ".webm") , "video/webm")

			//video.setAttribute('src', myevents[asset.getId()].asset);
			//video.setAttribute('src', myevents[asset.getId()].asset.replace(".mp4", ".ogv"));
			//video.setAttribute('src', myevents[asset.getId()].asset.replace(".mp4", ".webm"));
			video.load();
			video.play();
			setVideo(video, oImage);
		}



		//change the bg
		//console.log(myevents[currentId].nobg);
		if (myevents[currentId].asset_type == "image" && myevents[currentId].nobg != "1") {
			bg.setImage(myImage);
			bg.setCrop(fit_to_window(myevents[currentId].width, myevents[currentId].height, w, h))
			bg.setWidth(w)
			bg.setHeight(h)
			bg.cache();
			bglayer.draw();
		}
		overlay_layer.draw();
	}
	function setVideo(v, i) {
		if (!v.paused && !v.ended) {
			i.setImage(v);
			overlay_layer.draw();
			setTimeout(setVideo, 20, v, i);
		}
	}
	moveTimeline(unit,1,Kinetic.Easings.EaseInOut)
}

	function addSourceToVideo(element, src, type) {
    var source = document.createElement('source');

    source.src = src;
    source.type = type;

    element.appendChild(source);
}


    </script>
  </body>
</html>
