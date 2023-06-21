# Export Server Load in JSON format
![PHP](https://img.shields.io/badge/language-PHP-blue)
![MySQL](https://img.shields.io/badge/database-MySQL-blue)
![MariaDB](https://img.shields.io/badge/database-MariaDB-blue)
![Unix](https://img.shields.io/badge/platform-Unix-green)

## Description
This script allows you to export server load information in JSON format, which is required by various monitoring systems, such as [MonitorUptime.io](https://monitoruptime.io/), for retrieving external server load data. It retrieves server load data and converts it into a JSON string, enabling easy processing and analysis.

The motivation behind this project was to provide a simple and convenient way to monitor server load and seamlessly integrate it with other systems or tools.

By exporting the data in JSON format, it becomes easier to process and utilize server load information. This project efficiently extracts server load data and provides a standardized format for consumption. Throughout the development process, you will learn how to retrieve system load information and convert it into JSON format using PHP.

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

## Features

- Validate call using API-Key
- Retrieves server load information.
- Exports server load data in JSON format.
- Easy integration with other systems or tools.

## How to Contribute
We appreciate and welcome contributions from the developer community to enhance this project. If you would like to contribute, please follow the guidelines below:

Cloning the Repository
Fork the repository: Click on the "Fork" button at the top right corner of this repository page. This will create a copy of the repository in your GitHub account.

Clone the repository: On your local machine, navigate to the directory where you want to clone the repository. Use the following command to clone the repository:
```bash
git clone https://github.com/YourUsername/uptime-monitoring-server-load.git
``` 
Replace `YourUsername` with your GitHub username.

### Making Changes

- Create a new branch: Before making any changes, create a new branch to work on. Use a descriptive branch name that reflects the nature of your changes. You can create a new branch using the following command: 
```bash
git checkout -b your-branch-name
```

- Make your modifications: Make the necessary changes or additions to the codebase. Ensure that your changes align with the project's objectives and coding standards.

- Test your changes: Before submitting your contribution, test your changes locally to ensure they work as expected and do not introduce any regressions.

- Commit your changes: Once you are satisfied with your modifications, commit your changes with a descriptive commit message that explains the purpose of your changes:

```bash
git commit -m "Add feature XYZ"
```

### Submitting a Pull Request
- Push your changes: Push your local branch to your forked repository on GitHub:
```bash 
git push origin your-branch-name
```
- Open a Pull Request: Go to the original repository's page on GitHub and click on the "Pull Request" button. Fill in the necessary details for your pull request, including a clear description of the changes you have made.

- Discuss and iterate: Once the pull request is opened, it will be reviewed by the project maintainers. They may provide feedback or request additional changes. Be responsive to the feedback and make any necessary adjustments.

- Merging the changes: If your pull request is approved and meets the project's guidelines, it will be merged into the main repository. Congratulations, you've successfully contributed to the project!

### Code of Conduct
When contributing to this project, please adhere to the project's Code of Conduct. Be respectful and considerate of others, and promote a positive and inclusive environment for collaboration.

We appreciate all contributions, whether it's fixing a bug, adding a new feature, improving documentation, or suggesting enhancements. Thank you for your support and for helping make this project even better!
