var threadlib = require('patchwork-threads')

l=process.argv[2];
post=process.argv[3];

var ssbClient = require('ssb-client')
var ssbKeys = require('ssb-keys')
var ssbFeed = require('ssb-feed')
var opts;
//console.log("/var/www/backend/keys/" + post);
var keyz = ssbKeys.load('/var/www/backend/keys/' + l , function(err, k) {
        ssbClient(keyz,
        function (err, sbot) {
		threadlib.fetchThreadRootID (sbot, "%EMvz0bxeeJYVfwNKGzjTYDcAaI3+88w+BdTp4uAXeF8=.sha256",function(err, a) { 
			console.log(err)

})
        })
process.exit(1);
});




