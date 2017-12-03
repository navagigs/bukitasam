<table width="100%" border="1 ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>JARAK</th>
                                            <th>TUJUAN</th>
                                            <th>NAMA PEGAWAI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT 
                                            kereta.id_kereta AS id_kereta,
                                            kereta.tujuan AS tujuan,
                                            pegawai.id_pegawai AS id_pegawai,
                                            pegawai.nama AS nama,
                                            stasiun.id_stasiun AS id_stasiun,
                                            stasiun.jarak AS jarak
                                            FROM stasiun
                                            LEFT JOIN kereta ON kereta.id_kereta=stasiun.id_kereta
                                            LEFT JOIN pegawai ON pegawai.id_pegawai=stasiun.id_pegawai
                                            ");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td align="center"><?php echo $row->jarak; ?></td>
                                            <td align="center"><?php echo $row->tujuan; ?></td>
                                            <td align="center"><?php echo $row->nama; ?></td>
                                          </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>