# Dou Seal - Instruction and Feature Guide

## Overview

Dou Seal is a document signing platform built with Laravel. It offers an efficient, cost-effective, and customizable solution for handling document signatures, making it an ideal alternative to DocuSign. This guide provides detailed instructions on using Dou Seal and highlights its key features.

## Key Features

### 1. Cost-Effective Solution
Dou Seal is a cheaper alternative to DocuSign, offering the same functionalities at a fraction of the cost.

### 2. Template-Based Signing
- **Template Flexibility**: Templates can be used to streamline the signing process.
- **Database Integration**: Templates can incorporate values from a database, enabling the creation of multiple documents with varying data.
- **Dynamic Fields**: Populate templates with dynamic values from the database for personalized documents.

### 3. Email Document Delivery
- **Automated Emails**: Send signed documents directly via email.
- **Customizable Email Content**: Customize the email content and subject for better communication.

### 4. Laravel Integration
- **Laravel Framework**: Built using the Laravel framework, ensuring a robust and scalable solution.
- **API Support**: Integrate Dou Seal with other applications using its API.

## Instructions

### Prerequisites
- PHP 7.3 or higher
- Composer
- Laravel 8.x or higher
- MySQL or PostgreSQL database

# for demo video click link below

[ DOCU SEAL DEMO  ](https://photos.app.goo.gl/iVaHJ7DrZRQCQbJX8)




### Installation

1. **Clone the Repository**
    ```sh
    git clone https://github.com/yourusername/dou-seal.git
    cd dou-seal
    ```

2. **Install Dependencies**
    ```sh
    composer install
    ```

3. **Environment Configuration**
    - Copy the `.env.example` to `.env`
    ```sh
    cp .env.example .env
    ```
    - Update the `.env` file with your database and mail server details.

4. **Generate Application Key**
    ```sh
    php artisan key:generate
    ```

5. **Run Migrations**
    ```sh
    php artisan migrate
    ```

6. **Serve the Application**
    ```sh
    php artisan serve
    ```

### Usage

#### Creating Templates

1. **Access Template Creation**
    - Navigate to the Templates section in the admin panel.
    - Click on "Create New Template".

2. **Design the Template**
    - Use the template editor to design your document.
    - Insert placeholders for dynamic data (e.g., `{{ first_name }}`, `{{ last_name }}`).

3. **Save Template**
    - Save the template for future use.

#### Sending Documents

1. **Prepare Document**
    - Select a template.
    - Populate the template with data from the database or manually input values.

2. **Send for Signature**
    - Enter the recipient's email address.
    - Customize the email content if necessary.
    - Send the document for signature.

3. **Track Status**
    - Monitor the status of the document (e.g., sent, viewed, signed) from the dashboard.

### API Integration

Dou Seal provides a RESTful API to integrate with other applications.

- **Authentication**
    - Use API tokens for authentication.

- **Endpoints**
    - `POST /api/templates`: Create a new template.
    - `POST /api/documents`: Create and send a document for signing.
    - `GET /api/documents/{id}`: Retrieve the status of a document.

- **Example API Request**
    ```sh
    curl -X POST https://your-dou-seal-instance.com/api/documents \
    -H "Authorization: Bearer YOUR_API_TOKEN" \
    -H "Content-Type: application/json" \
    -d '{
        "template_id": 1,
        "recipient_email": "user@example.com",
        "data": {
            "first_name": "John",
            "last_name": "Doe"
        }
    }'
    ```

## Conclusion

Dou Seal is a powerful, cost-effective, and flexible solution for managing document signatures. With its template-based system, database integration, and email capabilities, it streamlines the entire process, making it easier and more efficient. Built with Laravel, it ensures scalability and robustness, suitable for businesses of all sizes.

For further assistance, refer to the [official documentation](https://your-dou-seal-instance.com/docs) or contact support at support@dou-seal.com."# Docu_seal" 
