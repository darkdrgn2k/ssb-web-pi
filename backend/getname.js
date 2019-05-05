l=process.argv[2];
ID=process.argv[3];

var ssbClient = require('ssb-client')
var ssbKeys = require('ssb-keys')
var ssbFeed = require('ssb-feed')

var keyz = ssbKeys.load('/var/www/backend/keys/' + l , function(err, k) {
        ssbClient(keyz,
          function (err, sbot) {

          var pull = require('pull-stream')
          pull(
            sbot.links({
              source: ID,
              dest: ID,
              rel: 'about',
              values: true,
              reverse: true
            }),
            pull.collect(function (err, msgs) {
              if (msgs.length>0)
                 console.log(msgs[0].value.content.name);
              sbot.close()
              })
         )
         });
});

