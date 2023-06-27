<?php

namespace App\Services;

use App\Entity\Reservation;
use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ReservationsMailer
{
    /** @var MailerInterface */
    private $mailer;

    /**
     *
     * @param MailerInterface $mailerInterface
     */
    public function __construct(MailerInterface $mailerInterface)
    {
        $this->mailer = $mailerInterface;
    }

    // With every new reservation
    public function newReservationEmail(Reservation $reservation)
    {
        $newEmail = new Email();

        $newEmail->from("oresto@mailgun-spe.com")

            //Version free of mailgun so not possible to send a real mail
            //->to($reservation->getUser()->getEmail())
            ->to("felix.picot1989@gmail.com")
            ->subject("Confirmation de votre réservation en ligne")
            ->text("Nous vous confirmons avoir bien réceptionné votre réservation, effective sous réserve qu'il reste de la place à ce créneau. Dans le cas contraire, nous vous contacterons afin de modifier la réservation avec vous.");

        $this->mailer->send($newEmail);
    }

} 