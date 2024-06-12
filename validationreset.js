const validation = new JustValidate("#reset");
validation
    .addField("#new_password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#confirm_password", [
        {
            validator: (value, fields) => {
                return value === fields["#new_password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("reset").submit();
    });
