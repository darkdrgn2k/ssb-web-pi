const l = process.argv[2];

var ssbClient = require('ssb-client');
var ssbKeys = require('ssb-keys');
var ssbFeed = require('ssb-feed');
var pull = require('pull-stream');

var keyz = ssbKeys.load('/var/www/backend/keys/' + l , function(err, k) {
        ssbClient(keyz,
        function (err, sbot) {
		    pull(
                sbot.createHistoryStream({ id: k.id, live: false } ),
                pull.filter(msg => typeof msg.value.content === 'object' && !msg.value.content.root),
                pull.collect((err, msgs) => {
                    console.log(JSON.stringify(msgs));
                    sbot.close();
                })
            )
        })
})