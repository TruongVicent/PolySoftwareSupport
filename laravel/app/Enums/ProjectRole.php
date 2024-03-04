<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;


enum ProjectRole: string implements HasLabel
{
    case NhomTruong = 'Nhóm trưởng';
    case ThanhVien = 'Thành viên';
    case QuanLy = 'Quản lý';
    case KhachHang = 'Khách hàng';

    public function getName(): string
    {
        return match ($this) {
            self::NhomTruong => 'Nhóm trưởng',
            self::ThanhVien => 'Thành viên',
            self::QuanLy => 'Quản lý',
            self::KhachHang => 'Khách hàng',
        };
    }

    public function getLabel(): string
    {
        return $this->name;
    }

}
