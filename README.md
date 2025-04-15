# 📝 PHP Registration Form

This project is a small PHP exercise that demonstrates how to handle user input using the `$_POST` superglobal. The goal is to build a **user registration form** with validation and error handling.

---

## 🎯 Objective

Create an HTML registration form with PHP backend that:

- Validates user input
- Displays error messages when inputs are invalid
- Shows a success message when all inputs are valid

---

## 📋 Form Fields

The registration form includes the following fields:

- ✅ **Last Name** (required, between 2 and 30 characters)
- ✅ **First Name** (required, between 2 and 30 characters)
- ✅ **Email Address** (required, must contain `@` and `.`)
- ✅ **Password** (required, hidden input)
- ✅ **Password Confirmation** (required, hidden input)
- ✅ **GDPR Agreement**: a checkbox to accept the privacy policy (required)

---

## 🔍 Validation Rules

When the form is submitted, the PHP script validates:

- That **all required fields** are filled
- That **first and last names** are between 2 and 30 characters
- That the **email** format is valid
- That **both passwords match**
- That the **GDPR checkbox** is checked

---

## ⚠️ Error Handling

If there are validation errors:

- Error messages appear below each invalid field
- Previously entered values are preserved (except passwords, for security)

---

## ✅ Success Message

If all validations pass:

- A success message is displayed:  
  `Registration successful! Welcome!`
- The form remains visible but is cleared for a potential new entry

---

## 💅 Bonus CSS Styling

A simple CSS style is applied to enhance the look of the form.

---

## 🖼 Screenshot

![Screenshot](/appa/assets/screenshot.png)

---

## 🚀 How to Run

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/php-registration-form.git
   cd php-registration-form
   

## 📂 Project Structure
Formulaire/
├── css/
│   └── styles.css

├── app/
│   └── assets/
        └── screenshot.png
    ├── index.php│       
└── README.md

## 🛠 Technologies Used

    PHP 8.x

    HTML5 / CSS3

    No database required (pure server-side validation)

## 👨‍💻 Author

Project built as part of a PHP learning exercise.
Developed by: Job Makombela or GitHub makombelajob Here