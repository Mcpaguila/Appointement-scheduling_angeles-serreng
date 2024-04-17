<?php

// Define a class to manage appointments
class AppointmentScheduler {
    private $appointments = [];
// Function to request an appointment
    public function requestAppointment($user, $dateTime) {
        $this->appointments[] = [
            'user' => $user,
            'dateTime' => $dateTime,
            'status' => 'pending' // Initial status is pending
        ];
    }
    // Function to get the user who requested a particular appointment
    public function getRequestingUser($dateTime) {
        foreach ($this->appointments as $appointment) {
            if ($appointment['dateTime'] == $dateTime) {
                return $appointment['user'];
            }
        }
        return null; // Return null if appointment not found
    }
    // Function to approve or deny an appointment
    public function approveOrDenyAppointment($dateTime, $status) {
        foreach ($this->appointments as &$appointment) {
            if ($appointment['dateTime'] == $dateTime) {
                $appointment['status'] = $status;
                return true;
            }
        }
        return false; // Return false if appointment not found
    }
}

// Example usage:
$scheduler = new AppointmentScheduler();

// Request an appointment
$scheduler->requestAppointment("John", "2024-04-20 09:00:00");

// Get the user who requested a specific appointment
$requestingUser = $scheduler->getRequestingUser("2024-04-20 09:00:00");

if ($requestingUser) {
    echo "The appointment was requested by: " . $requestingUser . "\n";
} else {
    echo "Appointment not found.\n";
}

// Approve or deny the appointment
$scheduler->approveOrDenyAppointment("2024-04-20 09:00:00", "approved");

// Get the status of the appointment
$appointmentStatus = $scheduler->getRequestingUser("2024-04-20 09:00:00");

if ($appointmentStatus) {
    echo "The appointment status is: " . $appointmentStatus['status'] . "\n";
} else {
    echo "Appointment not found.\n";
}

?>