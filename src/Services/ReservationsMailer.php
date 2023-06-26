<?php

namespace App\Services;

use App\Entity\Reservation;
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
            ->to("stefie.guilbault@gmail.com")
            ->subject("Confirmation de votre réservation en ligne")
            ->text("Nous vous confirmons avoir bien réceptionné votre réservation, effective sous réserve qu\'il reste de la place à ce créneau. Dans le cas contraire, nous vous contacterons afin de modifier la réservation avec vous.");

        $this->mailer->send($newEmail);
    }

}