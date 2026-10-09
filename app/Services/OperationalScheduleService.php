<?php

namespace App\Services;

use Carbon\Carbon;

class OperationalScheduleService
{
    /**
     * Daftar Hari Libur Nasional Tetap (Bulan-Tanggal: MM-DD)
     */
    protected static array $fixedHolidays = [
        '01-01' => 'Tahun Baru Masehi',
        '05-01' => 'Hari Buruh Internasional',
        '06-01' => 'Hari Lahir Pancasila',
        '08-17' => 'Hari Kemerdekaan Republik Indonesia',
        '12-25' => 'Hari Raya Natal',
    ];

    /**
     * Daftar Hari Libur Nasional Bergerak Berdasarkan Tahun (YYYY-MM-DD)
     * Mengikuti SKB 3 Menteri untuk kalender Indonesia
     */
    protected static array $movableHolidays = [
        // 2025
        '2025-01-27' => 'Isra Mi\'raj Nabi Muhammad SAW',
        '2025-01-29' => 'Tahun Baru Imlek 2576 Kongzili',
        '2025-03-29' => 'Hari Suci Nyepi (Tahun Baru Saka 1947)',
        '2025-03-31' => 'Hari Raya Idul Fitri 1446 Hijriah',
        '2025-04-01' => 'Hari Raya Idul Fitri 1446 Hijriah',
        '2025-04-18' => 'Wafat Yesus Kristus',
        '2025-05-12' => 'Hari Raya Waisak 2569 BE',
        '2025-05-29' => 'Kenaikan Yesus Kristus',
        '2025-06-06' => 'Hari Raya Idul Adha 1446 Hijriah',
        '2025-06-27' => '1 Muharram / Tahun Baru Islam 1447 Hijriah',
        '2025-09-05' => 'Maulid Nabi Muhammad SAW',

        // 2026
        '2026-01-16' => 'Isra Mi\'raj Nabi Muhammad SAW',
        '2026-02-17' => 'Tahun Baru Imlek 2577 Kongzili',
        '2026-03-19' => 'Hari Suci Nyepi (Tahun Baru Saka 1948)',
        '2026-03-20' => 'Hari Raya Idul Fitri 1447 Hijriah',
        '2026-03-21' => 'Hari Raya Idul Fitri 1447 Hijriah',
        '2026-04-03' => 'Wafat Yesus Kristus',
        '2026-05-14' => 'Kenaikan Yesus Kristus',
        '2026-05-27' => 'Hari Raya Idul Adha 1447 Hijriah',
        '2026-05-31' => 'Hari Raya Waisak 2570 BE',
        '2026-06-16' => '1 Muharram / Tahun Baru Islam 1448 Hijriah',
        '2026-08-25' => 'Maulid Nabi Muhammad SAW',

        // 2027
        '2027-01-06' => 'Isra Mi\'raj Nabi Muhammad SAW',
        '2027-02-06' => 'Tahun Baru Imlek 2578 Kongzili',
        '2027-03-10' => 'Hari Raya Idul Fitri 1448 Hijriah',
        '2027-03-11' => 'Hari Raya Idul Fitri 1448 Hijriah',
        '2027-03-26' => 'Wafat Yesus Kristus',
        '2027-05-06' => 'Kenaikan Yesus Kristus',
        '2027-05-17' => 'Hari Raya Idul Adha 1448 Hijriah',
        '2027-05-20' => 'Hari Raya Waisak 2571 BE',
        '2027-06-06' => '1 Muharram / Tahun Baru Islam 1449 Hijriah',
        '2027-08-15' => 'Maulid Nabi Muhammad SAW',
    ];

    /**
     * Memeriksa apakah tanggal yang diberikan adalah hari libur (Hari Minggu atau Hari Libur Nasional/Tanggal Merah)
     */
    public static function isHoliday(?Carbon $date = null): bool
    {
        $date = $date ? $date->copy()->setTimezone('Asia/Jakarta') : Carbon::now('Asia/Jakarta');

        // Hari Minggu selalu libur
        if ($date->isSunday()) {
            return true;
        }

        // Cek tanggal merah tetap tahunan
        $monthDay = $date->format('m-d');
        if (isset(self::$fixedHolidays[$monthDay])) {
            return true;
        }

        // Cek tanggal merah bergerak
        $fullDate = $date->format('Y-m-d');
        if (isset(self::$movableHolidays[$fullDate])) {
            return true;
        }

        return false;
    }

    /**
     * Mendapatkan keterangan nama hari libur jika hari ini libur
     */
    public static function getHolidayName(?Carbon $date = null): ?string
    {
        $date = $date ? $date->copy()->setTimezone('Asia/Jakarta') : Carbon::now('Asia/Jakarta');

        if ($date->isSunday()) {
            return 'Hari Minggu';
        }

        $monthDay = $date->format('m-d');
        if (isset(self::$fixedHolidays[$monthDay])) {
            return self::$fixedHolidays[$monthDay];
        }

        $fullDate = $date->format('Y-m-d');
        if (isset(self::$movableHolidays[$fullDate])) {
            return self::$movableHolidays[$fullDate];
        }

        return null;
    }

    /**
     * Mendapatkan status operasional lengkap untuk tampilan badge dan jadwal (Google Maps style)
     */
    public static function getStatus(?Carbon $date = null): array
    {
        $date = $date ? $date->copy()->setTimezone('Asia/Jakarta') : Carbon::now('Asia/Jakarta');
        $isHoliday = self::isHoliday($date);
        $holidayName = self::getHolidayName($date);

        // Jam operasional
        // Senin - Jumat: 08:00 - 16:00
        // Sabtu: 08:00 - 14:00
        // Minggu / Libur: Tutup
        $isOpenToday = !$isHoliday;
        $isOpenNow = false;
        $currentTime = $date->format('H:i');

        $closeTime = $date->isSaturday() ? '14:00' : '16:00';
        $openTime = '08:00';

        if ($isOpenToday) {
            if ($currentTime >= $openTime && $currentTime < $closeTime) {
                $isOpenNow = true;
            }
        }

        if ($isOpenNow) {
            // Sedang Buka
            $statusText = 'Buka';
            $subText = "Tutup pukul {$closeTime}";
            $tagBadgeClass = 'bg-emerald-100 text-emerald-800 border border-emerald-200/60';
            $dotClass = 'bg-emerald-500 animate-pulse';
            $description = "Sedang Buka (Tutup pukul {$closeTime} WIB)";
        } else {
            // Sedang Tutup
            $statusText = 'Tutup';
            $tagBadgeClass = 'bg-rose-100 text-rose-800 border border-rose-200/60';
            $dotClass = 'bg-rose-500';

            if ($isHoliday) {
                // Hari libur / Minggu
                $nextOpen = self::getNextOpenDescription($date);
                $subText = $nextOpen;
                $description = $holidayName ? "Tutup ({$holidayName})" : "Tutup (Hari Libur)";
            } elseif ($currentTime < $openTime) {
                // Hari kerja tapi belum jam buka pagi
                $subText = "Buka pukul {$openTime}";
                $description = "Tutup saat ini (Buka hari ini pukul {$openTime} WIB)";
            } else {
                // Hari kerja tapi sudah lewat jam tutup
                $subText = self::getNextOpenDescription($date);
                $description = "Sudah Tutup ({$subText} WIB)";
            }
        }

        $tagLabel = "{$statusText} · {$subText}";

        return [
            'isOpenNow'     => $isOpenNow,
            'isOpenToday'   => $isOpenToday,
            'isHoliday'     => $isHoliday,
            'holidayName'   => $holidayName,
            'statusText'    => $statusText,
            'subText'       => $subText,
            'tagLabel'      => $tagLabel,
            'tagBadgeClass' => $tagBadgeClass,
            'dotClass'      => $dotClass,
            'description'   => $description,
            'currentTime'   => $currentTime,
            'dayName'       => $date->translatedFormat('l'),
            'formattedDate' => $date->translatedFormat('d F Y'),
        ];
    }

    /**
     * Menghitung kapan waktu buka berikutnya (contoh: "Buka besok 08:00" atau "Buka Senin 08:00")
     */
    public static function getNextOpenDescription(Carbon $date): string
    {
        $check = $date->copy()->addDay()->startOfDay();
        for ($i = 0; $i < 7; $i++) {
            if (!self::isHoliday($check)) {
                if ($i === 0) {
                    return 'Buka besok 08:00';
                }

                $dayNames = [
                    Carbon::MONDAY    => 'Senin',
                    Carbon::TUESDAY   => 'Selasa',
                    Carbon::WEDNESDAY => 'Rabu',
                    Carbon::THURSDAY  => 'Kamis',
                    Carbon::FRIDAY    => 'Jumat',
                    Carbon::SATURDAY  => 'Sabtu',
                ];
                $dayName = $dayNames[$check->dayOfWeek] ?? $check->translatedFormat('l');
                return "Buka {$dayName} 08:00";
            }
            $check->addDay();
        }

        return 'Buka pukul 08:00';
    }
}
