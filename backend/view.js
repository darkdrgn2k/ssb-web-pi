
var ssbKeys = require('ssb-keys')
var pull = require('pull-stream')
//var sb = require('scuttlebot');
l=process.argv[2];



var ssbClient = require('ssb-client')
var ssbKeys = require('ssb-keys')
var ssbFeed = require('ssb-feed')
var t
//console.log("/var/www/backend/keys/" + post);
var keyz = ssbKeys.load('/var/www/backend/keys/' + l , function(err, k) {
        ssbClient(keyz,
        function (err, sbot) {


                pull(
                          sbot.createHistoryStream({ id: k.id, life: false } ),
                          pull.filter(msg => typeof msg.value.content === 'object' && !msg.value.content.root),
                          pull.drain( msg => {
                          console.log(JSON.stringify(msg))
                          console.log(",")
                          clearTimeout(t)
                           t=setTimeout(function(){ process.exit(1) }, 500);
                         })
                )
/*
                  pull.drain(msg => {
                    console.log(msg)
                    console.log(",")
                  });
*/
        })


})
// we're going to build some nice helper methods for validating with json schema soon
/*function isPost (msg) {
  const { type, text } = msg.value.content
  return type === 'post' && text
}*/
