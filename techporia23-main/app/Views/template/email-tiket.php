<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tiket Seminar Technology Euphoria</title>
</head>

<body
    style="margin: 0; padding 1rem; display: flex; justify-content: center; align-items: center; font-family: 'Helvetica'; font-size: 1.1rem;">
    <div
        style="background-color: #3b3b3b; color: #cdcdcd; margin: 5rem 0; border-radius: 10px; overflow: hidden; width: 650px;">
        <h1
            style="background-color: #68a504; margin: 0; padding: 2rem; font-size: 2.5rem; font-weight: 700; text-align: center;">
            TECHNOLOGY EUPHORIA</h1>
        <table style="width: 100%; margin: 1rem 0; color: #cdcdcd;">
            <tr>
                <td style="text-align: center;">
                    <?= date('F j, Y, g:i a', strtotime($transaction['transaction_time'])); ?>
                </td>
            </tr>
            <tr style=" font-size: 2.5rem; font-weight: 500;">
                <th>
                    <?= $harga; ?>
                </th>
            </tr>
        </table>
        <table style="width: 100%; padding: 0 1rem; border-spacing: 1rem; color: #cdcdcd;">
            <tr>
                <td style="color: #838383;">Status transaksi</td>
                <td style="text-align: right;">
                    <div
                        style="outline: 1px solid #06d000; padding: 0.2rem 1.2rem; color: #06d000; border-radius: 2px; display: inline;">
                        Berhasil
                    </div>
                </td>
            </tr>
            <tr>
                <td style="color: #838383;">Order ID</td>
                <th style="font-weight: 500; text-align: right;">
                    <?= $data['order_id']; ?>
                </th>
            </tr>
            <tr>
                <td style="color: #838383;">Metode Bayar</td>
                <th style="font-weight: 500; text-align: right;">
                    <?= strtoupper($transaction['payment_type']); ?>
                </th>
            </tr>
        </table>

        <hr style="margin: 2rem 0;" />

        <div style="padding: 0 1rem;">
            <p style="text-align: justify; font-size: 1rem; color: #cdcdcd;">Terimakasih telah bertransaksi! Pembayaran anda telah
                diterima dengan rincian sebagai berikut :</p>
            <h3 style="color: #cdcdcd;">Rincian Pembayaran</h2>
                <table style="width: 100%; border-spacing: 1rem; color: #cdcdcd;">
                    <tr>
                        <th style="text-align: left;">Total Pembayaran</th>
                        <td>
                            <?= $harga; ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Waktu Pembayaran</th>
                        <td>
                            <?= date('F j, Y, g:i a', strtotime($transaction['transaction_time'])); ?>
                        </td>
                    </tr>
                </table>
                <h3>Rincian Pesanan</h3>
                <table style="width: 100%; border-spacing: 1rem;">
                    <tr>
                        <th style="text-align: left;">Tiket Seminar Technology Euphoria 2023
                            <?= $data['kategori']; ?>
                        </th>
                        <td>
                            <?= $harga; ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Total Belanja</th>
                        <td>
                            <?= $harga; ?>
                        </td>
                    </tr>
                </table>
        </div>

        <hr style="margin: 2rem 0;" />

        <p style="font-size: 0.9rem; padding: 0 1rem; text-align: justify; margin-bottom: 2rem; color: #cdcdcd;">Silahkan cek tiket
            seminar anda di lampiran email ini dan silahkan gabung ke <a href="https://chat.whatsapp.com/FrwMn2xKnQsFqb6GYk9c89"
                style="color: #97fb57">grup WhatsApp</a> untuk informasi lebih lanjut. Jika anda mengalami kesulitan, silahkan hubungi pihak
            kami melalui email di <a href="mailto:technologyeuphoria.unsri@gmail.com"
                style="color: #97fb57">technologyeuphoria.unsri@gmail.com</a></p>
    </div>
</body>

</html>