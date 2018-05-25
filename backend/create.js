file=process.argv[2];

var ssbkeys = require('ssb-keys')

ssbkeys.create("/var/www/backend/keys/" + file, function(err, k) {})
