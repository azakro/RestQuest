// amount of each icon
var count = 30;

//-----------------------------------
// Symbols allow you to place multiple instances of an item in your project.
//-----------------------------------

//-----------------------------------
// Raster images loaded in the HTML and make symbols from them
//-----------------------------------

var rasterBench = new Raster('bench');
var benchSymbol = new Symbol(rasterBench);

var rasterToilet = new Raster('toilet');
var toiletSymbol = new Symbol(rasterToilet);

var rasterWater = new Raster('water');
var waterSymbol = new Symbol(rasterWater);

// Place the instances of the symbols by looping through all them:
for (var i = 0; i < count; i++) {

	// randomize the centers for each icon:
	var benchCenter = Point.random() * view.size;
  var toiletCenter = Point.random() * view.size;
  var waterCenter = Point.random() * view.size;

  //place all symbols
	var placedBenchSymbol = benchSymbol.place(benchCenter);
  var placedToiletSymbol = toiletSymbol.place(toiletCenter);
  var placedWaterSymbol = waterSymbol.place(waterCenter);

  //scale all symbols to get different sized ones
	placedBenchSymbol.scale(i / count);
  placedToiletSymbol.scale(i/count);
  placedWaterSymbol.scale(i/count);
}

// The onFrame function is called up to 60 times a second:
function onFrame(event) {
	// Run through the active layer's children list and change
	// the position of the placed symbols:
	for (var i = 1; i < count * 3; i++) {
		var item = project.activeLayer.children[i];

		// Move the item 1/20th of its width to the right. This way
		// larger circles move faster than smaller circles:
		item.position.x += item.bounds.width / 20;

		// If the item has left the view on the right, move it back
		// to the left:
		if (item.bounds.left > view.size.width) {
			item.position.x = -item.bounds.width;
		}
	}
}

//last layer to be added on active later - appears in front of moving symbols
var text = new PointText({
    point: view.center,
    content: 'RestQuest',
    justification: 'center',
    fillColor: 'white',
    fontFamily: 'Montserrat',
    // strokeColor: 'black',
    fontSize: 125
});
