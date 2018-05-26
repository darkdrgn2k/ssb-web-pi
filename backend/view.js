const l = process.argv[2];

const ssbClient = require('ssb-client');
const ssbKeys = require('ssb-keys');
const ssbFeed = require('ssb-feed');
const pull = require('pull-stream');

const keyz = ssbKeys.load('/var/www/backend/keys/' + l , function(err, k) {
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