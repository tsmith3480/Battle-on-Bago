var voicejs = require('./voice.js'),
    express = require('express'),
    bodyParser = require("body-parser"),
    app = express();

var client = new voicejs.Client({
    // Email of Account Owner
    email: 'htims.ynot@gmail.com',
    // Password of Account Owner
    password: 'Dad15540',
    // Token (cookie) of Account
    tokens: require('./tokens.json')
});

app.use(bodyParser.urlencoded({extended: false}));

app.post('/testPost', function (req, res) {
        var to = [req.body.to];
        var text = req.body.text;

        client.sms({ to: to[0], text: text}, function(err, res, data){
                if(err){
                        return console.log(err);
                }
                console.log('SMS "' +text+ '" sent to', to[0] + '. Conversation id: ', data.send_sms_response.conversation_id);
        });

        res.end();
})

var server = app.listen(8081, '192.168.2.8', function() {
        var host = server.address().address
        var port = server.address().port
        console.log("Example app listening at http://%s:%s", host, port)

})
