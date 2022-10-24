/*

$(function(){
    
    let datePicker = document.getElementById('datePickerFrom');
    let picker = new Lightpick({
        field: datePicker,
        minDate: moment(),
        onSelect: function(date){
            datePicker.value = date.format('Do MMMM YYYY');
            console.log(picker.toString('YYYY-MM-DD')) 
        }
    });
   // picker.setDateRange(new Date(), moment().add(7, 'day'));
});
 
$(function(){
    
    let datePicker = document.getElementById('datePickerTo');
    let picker = new Lightpick({
        field: datePicker,
        onSelect: function(date){
            datePicker.value = date.format('Do MMMM YYYY');
        }
    });
   
});*/

$(function () {
    var date = new Date(); // Current date 
    date.setDate(date.getDate() + 2); // Add days 
    var today = date.toJSON().slice(0, 10); // Converting date to yyyy-dd-mm format 
    var from = $('#datePickerFrom').attr('min', today); /// Set min date as the day after tomorrow's date

    $('#datePickerFrom').on('change', function () {
        // When user selects from date 
        // Grab value of from date.
        var fromDate = $('#datePickerFrom').val();
        //  Convert date to array 
        var dateArr = fromDate.split('-');
        var minDay = parseInt(dateArr[2]) + 1; // Increase one day for to date selection. 
        var maxDate = dateArr[0] + '-' + dateArr[1] + '-' + minDay; // Final date format {yyyy-dd-mm}
        $('#datePickerTo').attr('min', maxDate); // Set Min date for TO-DATE
        $('#datePickerTo').attr('readonly', false ); // Make to date editable 
    });
}); 