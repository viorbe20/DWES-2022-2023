<?php

/**
 * Select tickets numbers for the member
 */
function getMembersTickets($membersAmount){
    $tickets = array();
    $count = 0;
    while ($count < $membersAmount) {
        //Generates a random number between 1 and 100
        $ticket = rand(1, TOTAL_TICKETS);
        //If the ticket is not in the array, add it
        if (!in_array($ticket, $tickets)) {
            $tickets[] = $ticket;
            $count++;
        } 
    }
    return $tickets;
}