# Export Server Load in JSON format

## Description

This script allows you to export the servers load information in JSON format which is needed by https://monitoruptime.io/ 
if you have chosen to monitor this. It retrieves server load data and converts it into a JSON string for easy processing and analysis. 
The motivation behind this project was to provide a simple and convenient way to monitor server load and integrate it 
with other systems or tools. 

By exporting the data in JSON format, it becomes easier to process and utilize the server load information. 
This project solves the problem of efficiently extracting server load data and provides a standardized format for its consumption. 
Throughout the development process, you will learn how to retrieve system load information and convert it into JSON format using PHP.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Credits](#credits)
- [License](#license)

## Requirements

It's recommended to run this script with sell_exec permissions

- PHP 5.6+
- MariaDB/MySQL
- shell_exec permissions
- mysqli php modules
- shell commands needed: grep, free, iostat

## Installation

To install and run this script, follow these steps:

1. Clone the repository: `git clone https://github.com/MonitorUptime/uptime-monitoring-server-load.git`
2. Move into the project directory: `cd uptime-monitoring-server-load`
3. Open the `monitoruptime_io.php` file and customize it according to your needs.
4. Upload the script to your server or web hosting environment.

## Usage

To use the script, follow these instructions:

1. Ensure that the script is correctly installed and running on your server.
2. Access the script's URL in a web browser since https://monitoruptime.io will try to access it using standard http/https.
3. The script will fetch the server load information and export it in JSON format.
4. MonitorUptime.IO will download the generated JSON data using.

Here's an example of how to use the script locally:

```php
// PHP example code
$response = file_get_contents('http://your-server.com/monitoruptime_io.php?api_key=your_api_key_here');
$data = json_decode($response, true);
```

This is what is expected to be returned:
To use the script, you will receive server load information in JSON format. Here's an example of the JSON structure:

```json
{
  "id_users": 1,
  "id_monitors": 1,
  "cpu_load_percent": 8.33,
  "memory_usage_percent": 24.01,
  "disk_usage_percent": 31.78,
  "num_queries": 22179611,
  "disk_io_wait_time": 0
}
```

- `id_users`: The ID of the user account id @MonitorUptime.IO.
- `id_monitors`: The ID of the server monitor @MonitorUptime.IO.
- `cpu_load_percent`: The percentage of CPU load.
- `memory_usage_percent`: The percentage of memory usage.
- `disk_usage_percent`: The percentage of disk usage.
- `num_queries`: The number of queries processed.
- `disk_io_wait_time`: The wait time for disk I/O operations.

## Credits
This project was created and maintained by Your Name.

## License
This project is licensed under the MIT License.

🏆 The previous sections are the essential components of a README file. You can consider adding the following sections based on your project requirements.

## Badges
badmath

Add relevant badges to showcase your project, such as the programming language used, build status, or any other indicators of project quality or popularity. You can create badges using services like shields.io.

## Features
List the key features of your project here. For example:

Retrieves server load information.
Exports server load data in JSON format.
Easy integration with other systems or tools.

## How to Contribute
If you would like other developers to contribute to your project, provide guidelines on how they can do so. You can use the Contributor Covenant or create your own guidelines.

## Tests
Explain how to run tests for your project and provide examples if applicable.