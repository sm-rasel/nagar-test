          // Slider Form Validation start

// $('#sliderDescription').keyup(function (){
//     var sliderDescription = $(this).val();
//     if (sliderDescription.length >= 2)
//     {
//         $('#sliderDescriptionError').text(' ');
//     }
//     else
//     {
//         $('#sliderDescriptionError').text('Please type minimum 5 letter in here!!');
//     }
// });
//Slider Button text validation
function checkButtonText()
{
    var buttonText = $('#buttonText').val();
    var regex = /^[a-zA-Z- ]{2,15}$/;
    if (regex.test(buttonText))
    {
        $('#sliderBtn').prop('disabled', false);
        $('#buttonTextError').text('');
        return true;
    }
    else
    {
        $('#sliderBtn').prop('disabled', true);
        $('#buttonTextError').text('Text field is required and min 2 to 15 letter');
        return false;
    }
}
$('#buttonText').keyup(function (){
    checkButtonText();
});
//Slider Button text validation End

//Slider Url validation-view (slider_section)
function checkUrl() {
    var buttonUrl = $('#buttonUrl').val();
    var regex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig;
    if (regex.test(buttonUrl))
    {
        $('#sliderBtn').prop('disabled', false);
        $('#buttonUrlError').text(' ');
        return true;
    }
    else
    {
        $('#sliderBtn').prop('disabled', true);
        $('#buttonUrlError').text('Please Type Valid Url !');
        return false;
    }
}
$('#buttonUrl').keyup(function (){
    checkUrl();
});
//Slider Url validation End

//Slider Order number validation
function checkNumber()
{
    var number = $('#sliderOrder').val();
    var regex = /^[0-9]*$/;
    if (regex.test(number))
    {
        $('#sliderBtn').prop('disabled', false);
        $('#sliderOrderError').text('');
        return true;
    }
    else
    {
        $('#sliderBtn').prop('disabled', true);
        $('#sliderOrderError').text('Please provide a valid Enrollment Number');
        return false;
    }
}
$('#sliderOrder').keyup(function (){
    checkNumber();
})
//Slider Order number validation End

$('#sliderForm').submit(function () {
    if (checkUrl() == true && checkNumber() == true && checkButtonText() == true)
    {
        return true;
    }
    else
    {
        return false;
    }
});

//Slider Image Preview-view (slider_section)
var loadFile = function(event) {
    var output= document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
        // Slider Form Validation start

