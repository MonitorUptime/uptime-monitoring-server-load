<?php

// Test this script at: https://your-domain.com/monitoruptime_io.php?api_key=your_api_key_here
// Set the API key
// Your Api-key, we have prefilled it for you from start if you choose to download it while being
// logged into: https://monitoruptime.io/ :)
$api_key = "your_api_key_here";

// Modify these values according to your database configuration
// DB Logic and Statistics will be presented in your dashboard @ MonitorUptime.IO
$db_host = 'localhost'; // The database you wish to monitor
$db_name = 'db_name';   // Database name
$db_user = 'db_user';   // Database username
$db_pass = 'db_pass';   // Database password
$db_port = '3306';      // Database port, 3306 is default

// Check if the API key is valid
if ($api_key !== $_REQUEST['api_key']) {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode(array("error" => "Invalid API key."));
    exit();
}

// Get CPU load
function get_server_cpu_load()
{
    $load = sys_getloadavg();
    $cores = intval(trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l")));
    $load_percent = round(($load[0] / $cores) * 100, 2);
    return $load_percent;
}

// Get memory usage
function get_server_memory_usage()
{
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_values($mem); // Fix: re-index the array after removing empty elements
    $memory_usage = round(((1 - ($mem[6] / $mem[1])) * 100), 2);
    return $memory_usage;
}

// Get disk usage
function get_server_disk_usage()
{
    $disk_total = disk_total_space('/');
    $disk_free = disk_free_space('/');
    $disk_used = $disk_total - $disk_free;
    $disk_usage = round(($disk_used / $disk_total) * 100, 2);
    return $disk_usage;
}

// Get number of database queries
function get_num_database_queries($db_host, $db_name, $db_user, $db_pass, $db_port)
{
    if ($db_name == 'db_name' || $db_user == 'db_user' || $db_pass == 'db_pass')
        return 0;

    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
    if (!$link) {
        return -1;
    }

    $result = mysqli_query($link, 'SHOW GLOBAL STATUS LIKE "Com_select"');
    $row = mysqli_fetch_assoc($result);
    $select = $row['Value'];

    $result = mysqli_query($link, 'SHOW GLOBAL STATUS LIKE "Com_insert"');
    $row = mysqli_fetch_assoc($result);
    $insert = $row['Value'];

    $result = mysqli_query($link, 'SHOW GLOBAL STATUS LIKE "Com_update"');
    $row = mysqli_fetch_assoc($result);
    $update = $row['Value'];

    $result = mysqli_query($link, 'SHOW GLOBAL STATUS LIKE "Com_delete"');
    $row = mysqli_fetch_assoc($result);
    $delete = $row['Value'];

    $result = mysqli_query($link, 'SHOW GLOBAL STATUS LIKE "Com_replace"');
    $row = mysqli_fetch_assoc($result);
    $replace = $row['Value'];

    $num_queries = $select + $insert + $update + $delete + $replace;
    return $num_queries;
}

// Get disk io wait time
function get_disk_io_wait_time()
{
    $iostat = shell_exec("iostat -dxk | awk 'NR==4 {print $14}'");
    $disk_io_wait_time = round(floatval($iostat), 2);
    return $disk_io_wait_time;
}

// Output results as JSON
$results = array(
    "id_users" => your_user_id_here,
    "id_monitors" => your_monitor_id_here,
    "cpu_load_percent" => get_server_cpu_load(),
    "memory_usage_percent" => get_server_memory_usage(),
    "disk_usage_percent" => get_server_disk_usage(),
    "num_queries" => get_num_database_queries($db_host, $db_name, $db_user, $db_pass, $db_port),
    "disk_io_wait_time" => get_disk_io_wait_time()
);

// Output server statistics in JSON Format.
echo json_encode($results);
?>