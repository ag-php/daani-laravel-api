@extends('emails.master')

@section('content')
    <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0"
            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffffff; border-bottom: 1px solid #edeff2; border-top: 1px solid #edeff2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                   style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffffff; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                <!-- Body content -->
                <tr>
                    <td class="content-cell"
                        style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                        <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">
                            Hi there,
                        </h1>
                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">

                            Thank you for signing up. Please take a moment to confirm your email address, by clicking on the button below
                        </p>
                        <a href="{{ $verificationLink }}" class="button button-blue"
                           target="_blank"
                           style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                                           color: #ffffff; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #159932; border-top: 10px solid #159932;
                                           border-right: 18px solid #159932; border-bottom: 10px solid #159932; border-left: 18px solid #159932;">
                            Verify Now
                        </a>

                        <p></p>
                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">

                            If you have any problem verifying your account, feel free to contact us at support@support.com
                        </p>
                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                            Thanks,<br>
                            Daani Team</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
