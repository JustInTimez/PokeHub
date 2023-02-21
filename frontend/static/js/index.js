axios.get('/api/all-pokemon').then(function(response) {
    // This is for success
    console.log(response.data);
}).catch(function (error) {
    // This is for errors
    console.log(error);
}).then(function () {
    // This is executed
});