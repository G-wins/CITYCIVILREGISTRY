<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Calendar {
    public $active_year, $active_month, $active_day;
    public $events = [];

    public function getMonth() {
        return $this->active_month;
    }
    
    public function getYear() {
        return $this->active_year;
    }
    
    public function __construct($year = null, $month = null) {
        $this->active_year = $year ?? date('Y');
        $this->active_month = $month ?? date('m');
        $this->active_day = date('d'); // Only needed for highlighting
    }
    
    public function add_event($txt, $date, $days = 1, $color = '') {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$txt, $date, $days, $color];
    }

    public function __toString() {
        $num_days = date('t', strtotime("{$this->active_year}-{$this->active_month}-01"));
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $first_day_of_week = array_search(date('D', strtotime("{$this->active_year}-{$this->active_month}-01")), $days);

        // Set today's date and the maximum selectable date (1 month from today)
        $today = date('Y-m-d');
        $maxDate = date('Y-m-d', strtotime('+1 month'));

        $html = '<div class="calendar">';
        $html .= '<div class="header">';
        $html .= '<div class="calendar-nav">';
        $html .= '<span class="nav-span prev-month" data-step="-1">❮</span>';
        $html .= '<span class="month-year" id="calendar-month">' . date('F Y', strtotime("{$this->active_year}-{$this->active_month}-01")) . '</span>';
        $html .= '<span class="nav-span next-month" data-step="1">❯</span>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="days">';

        foreach ($days as $day) {
            $html .= '<div class="day_name">' . $day . '</div>';
        }

        // Add empty slots before the first day of the month (completely unclickable)
        for ($i = 0; $i < $first_day_of_week; $i++) {
            $html .= '<div class="day_num ignore unavailable"></div>';
        }


        // Generate calendar days
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = ($i == $this->active_day) ? ' selected' : '';
        
            // Format the date (YYYY-MM-DD)
            $currentDate = "{$this->active_year}-{$this->active_month}-" . str_pad($i, 2, '0', STR_PAD_LEFT);
            $dayOfWeek = date('w', strtotime($currentDate)); // 0 (Sunday) to 6 (Saturday)
        
            // Check if the date is in the past or beyond one month
            $isPastOrFuture = (strtotime($currentDate) < strtotime($today) || strtotime($currentDate) > strtotime($maxDate)) ? ' unavailable' : '';
        
            // Check if it's a weekend (Saturday or Sunday)
            $isWeekend = ($dayOfWeek == 0 || $dayOfWeek == 6) ? ' weekend' : '';
        
            // Count total booked slots for the date (only for weekdays)
            $tables = [
                'appointment_birth_certificates',
                'appointment_marriage_certificates',
                'appointment_marriage_license',
                'appointment_death_certificates',
                'appointment_cenomars',
                'appointment_other_documents'
            ];
        
            $totalAppointments = 0;
            if (!$isWeekend) { // Only count slots for weekdays
                foreach ($tables as $table) {
                    $totalAppointments += DB::table($table)
                        ->whereDate('appointment_date', $currentDate)
                        ->count();
                }
            }
        
            $maxSlots = 100;
            $availableSlots = $maxSlots - $totalAppointments;
            
            // Show slots only if the date is available and it's not a weekend
            $slotText = (!$isPastOrFuture && !$isWeekend) ? "<span class='slot'>{$availableSlots} slots</span>" : "";

            // Add `data-date` attribute to store the formatted date for JavaScript
            $html .= "<div class='day_num{$selected}{$isPastOrFuture}{$isWeekend}' data-date='{$currentDate}'>";
            $html .= "<span class='date-number'>{$i}</span>"; // Small number (top-left)
            $html .= $slotText; // Available slots or nothing if unavailable
        
            foreach ($this->events as $event) {
                for ($d = 0; $d <= ($event[2] - 1); $d++) {
                    if (date('Y-m-d', strtotime("{$this->active_year}-{$this->active_month}-{$i} -{$d} day")) == date('Y-m-d', strtotime($event[1]))) {
                        $html .= "<div class='event{$event[3]}'>{$event[0]}</div>";
                    }
                }
            }
            $html .= '</div>';
        }

        $html .= '</div>'; // Close .days
        $html .= '</div>'; // Close .calendar

        return $html;
    }
}
