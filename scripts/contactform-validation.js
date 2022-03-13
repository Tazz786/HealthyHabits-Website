
$(function() {
    $("form[name='contact form']").validate({
      // Specify validation rules
      rules: {
        // attributes with input fields
        fullname: "required",
        fullname: 'pattern="^(?=^.{0,40}$)^[a-zA-Z-]+\s[a-zA-Z-]+$',
        email: {
            // email should be written in input
            required: true,
            // checks the email validation
            email: true
        },
        phone: {
          required: true,

          phone: true,
          pattern: '^(\+?\(61\)|\(\+?61\)|\+?61|\(0[1-9]\)|0[1-9])?( ?-?[0-9]){7,9}$'
        },
        message: {
            required: true,
  
            message: true
        }
      },
      // Specify validation error messages
      messages: {
          fullname: "Please enter your fullname",
          
          phone: {
              required: "Please match the format as requested",
            },
            email: "Please enter a valid email address", 
            message: "Enter your message here"
            
        },
        // event handler will submit the form
        submitHandler: function(form) {
        form.submit();
      }
    });
});