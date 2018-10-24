<div class="w3-container">
			<div class="w3-container w3-blue">
				<h4>MAKLUMAT IBUBAPA / PENJAGA / WARIS</h4>
			</div>
			<br/>
			 <div class="form-group">
					<label for="maklumat">Maklumat <span class="text-danger">*</span></label>
					<select class="form-control" name="maklumat" id="maklumat" required="required">
									<option value="0">Sila Pilih</option>
									<option value="1">Ibu bapa</option>
									<option value="2">Penjaga/Waris</option>
					</select>
			</div>
			<span id="maklumat-error" style="color:red"></span>
			<div class="w3-container w3-light-gray" id="ibubapacontainer" style="display:none">
				<br/>
							<div class="w3-row">
											<div>
															<div class="form-group">
																			<label for="nama_penuh">Nama Penuh Bapa <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_nama_penuh" id="b_nama_penuh" placeholder="Nama Penuh Bapa" value="<?php //echo $nama_penuh;?>" required="required">
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label>Jenis Pengenalan <span class="text-danger">*</span></label>
																			<div class="form-check">
																							<label class="form-check-label">
																											<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_a" value="Awam" checked="checked">
																											Awam
																							</label>&nbsp;&nbsp;
																							<label class="form-check-label">
																											<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_t" value="Tentera">
																											Tentera
																							</label>
																							<label class="form-check-label">
																											<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_p" value="Polis">
																											Polis
																							</label>
																			</div>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label id="no_mykad">No. MyKAD <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_mykad" id="b_mykad" placeholder="No MyKAD" value="<?php //echo $no_mykad;?>">
																			<span id="b_mykad-error" class="registration-error"></span>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
																			<select class="form-control" name="b_kewarganegaraan" id="b_kewarganegaraan" style="width:95%">
																							<option value="">Pilih Kewarganegaraan</option>
																							<?php
																							if (!empty($row_data[res_kewarganegaraan])) {
																											foreach ($row_data[res_kewarganegaraan] as $val_kwrg) {
																															$sel_kwrg = $val_kwrg->id == $b_kewarganegaraan ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="b_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
																			<select class="form-control" name="b_kategori_penjaga" id="b_kategori_penjaga">
																							<option value="">Pilih Kategori Penjaga</option>
																							<?php
																							if (!empty($row_data[ref_kategori_penjaga])) {
																											foreach ($row_data[ref_kategori_penjaga] as $val_kwrg) {
																															$sel_kwrg = $val_kwrg->id == $b_kategori_penjaga ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="no_telefon">No Telefon (cth: 0389008989) <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_no_tel" id="b_no_tel" placeholder="No Telefon" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_no_hp" id="b_no_hp" placeholder="No Telefon Bimbit" value="<?php //echo $no_hp;?>">
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="agama">Agama <span class="text-danger">*</span></label>
																			<select class="form-control" name="b_agama" id="b_agama" style="width:95%">
																							<option value="">Pilih agama</option>
																							<?php
																							if (!empty($row_data[res_agama])) {
																											foreach ($row_data[res_agama] as $val_agama) {
																															$sel_agama = $val_agama->id == $b_agama ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="etnik">Etnik <span class="text-danger">*</span></label>
																			<select class="form-control" name="b_etnik" id="b_etnik">
																							<option value="">Pilih Etnik</option>
																							<?php
																							if (!empty($row_data[res_etnik])) {
																											foreach ($row_data[res_etnik] as $val_etnik) {
																															$sel_etnik = $val_etnik->id == $b_etnik ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
																			<select class="form-control" name="b_bangsa" id="b_bangsa" style="width:95%">
																							<option value="">Pilih Bangsa</option>
																							<?php
																							if (!empty($row_data[res_bangsa])) {
																											foreach ($row_data[res_bangsa] as $val_bangsa) {
																															$sel_bangsa = $val_bangsa->id == $b_bangsa ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="form-group">
											<label for="b_alamat">Alamat Tetap <span class="text-danger">*</span></label>
											<textarea name="b_alamat" id="b_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control"><?php //echo $alamat;?></textarea>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="b_poskod">Poskod <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_poskod" id="b_poskod" placeholder="Poskod" style="width:95%">
																			<input type="hidden" name="b_poskod_id" id="b_poskod_id" value="<?php //echo $poskod;?>">
																			<span id="b_poskod-error" style="color:red"></span>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="b_bandar">Bandar <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_bandar" id="b_bandar" placeholder="Bandar">
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="b_negeri">Negeri <span class="text-danger">*</span></label>
																			<select class="form-control" name="b_negeri" id="b_negeri" style="width:95%">
																							<option value="">Pilih Negeri</option>
																							<?php
																							if (!empty($row_data[res_negeri])) {
																											foreach ($row_data[res_negeri] as $val_negeri) {
?>
																															<option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="b_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_pekerjaan" id="b_pekerjaan" placeholder="Pekerjaan" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="b_pendapatan">Pendapatan (RM) <span class="text-danger">*</span></label>
																			<select class="form-control" name="b_pendapatan" id="b_pendapatan">
																							<option value="">Pilih Pendapatan</option>
																							<?php
																							if (!empty($row_data[res_pendapatan])) {
																											foreach ($row_data[res_pendapatan] as $val_negeri) {
?>
																															<option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->pendapatan; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-half">
												<div class="form-group">
																			<label for="b_majikan">Majikan <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_majikan" id="b_majikan" placeholder="Majikan" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-quarter">
															<div class="form-group">
																			<label for="b_majikan">No Telefon Pejabat <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_no_tel_pejabat" id="b_no_tel_pejabat" placeholder="No Telefon Pejabat" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-quarter">
															<div class="form-group">
																			<label for="b_majikan">Samb <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="b_samb" id="b_samb" placeholder="Samb" value="<?php //echo $no_telefon;?>">
															</div>
											</div>
							</div>
							<div class="form-group">
											<label for="b_alamat_pejabat">Alamat Pejabat <span class="text-danger">*</span></label>
											<textarea name="b_alamat_pejabat" rows="3" cols="40" placeholder="Alamat Pejabat" class="form-control"><?php //echo $alamat;?></textarea>
							</div>
							<hr/>
							<br/>
							<div class="w3-row">
											<div>
															<div class="form-group">
																			<label for="nama_penuh">Nama Penuh Ibu <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_nama_penuh" id="c_nama_penuh" placeholder="Nama Penuh Ibu" value="<?php //echo $nama_penuh;?>">
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label>Jenis Pengenalan <span class="text-danger">*</span></label>
																			<div class="form-check">
																							<label class="form-check-label">
																											<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_a" value="Awam" checked="checked">
																											Awam
																							</label>&nbsp;&nbsp;
																							<label class="form-check-label">
																											<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_t" value="Tentera">
																											Tentera
																							</label>
																							<label class="form-check-label">
																											<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_p" value="Polis">
																											Polis
																							</label>
																			</div>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label id="c_no_mykad">No. MyKAD <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_mykad" id="c_mykad" placeholder="No MyKAD" value="<?php //echo $no_mykad;?>">
																			<span id="c_mykad-error" class="registration-error"></span>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
																			<select class="form-control" name="c_kewarganegaraan" id="c_kewarganegaraan" style="width:95%">
																							<option value="">Pilih Kewarganegaraan</option>
																							<?php
																							if (!empty($row_data[res_kewarganegaraan])) {
																											foreach ($row_data[res_kewarganegaraan] as $val_kwrg) {
																															$sel_kwrg = $val_kwrg->id == $b_kewarganegaraan ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="c_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
																			<select class="form-control" name="c_kategori_penjaga" id="c_kategori_penjaga">
																							<option value="">Pilih Kategori Penjaga</option>
																							<?php
																							if (!empty($row_data[ref_kategori_penjaga])) {
																											foreach ($row_data[ref_kategori_penjaga] as $val_kwrg) {
																															$sel_kwrg = $val_kwrg->id == $b_kategori_penjaga ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="no_telefon">No Telefon (cth: 0389008989) <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_no_tel" id="c_no_tel" placeholder="No Telefon" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_no_hp" id="c_no_hp" placeholder="No Telefon Bimbit" value="<?php //echo $no_hp;?>">
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="agama">Agama <span class="text-danger">*</span></label>
																			<select class="form-control" name="c_agama" id="c_agama" style="width:95%">
																							<option value="">Pilih agama</option>
																							<?php
																							if (!empty($row_data[res_agama])) {
																											foreach ($row_data[res_agama] as $val_agama) {
																															$sel_agama = $val_agama->id == $b_agama ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="etnik">Etnik <span class="text-danger">*</span></label>
																			<select class="form-control" name="c_etnik" id="c_etnik">
																							<option value="">Pilih Etnik</option>
																							<?php
																							if (!empty($row_data[res_etnik])) {
																											foreach ($row_data[res_etnik] as $val_etnik) {
																															$sel_etnik = $val_etnik->id == $b_etnik ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
																			<select class="form-control" name="c_bangsa" id="c_bangsa" style="width:95%">
																							<option value="">Pilih Bangsa</option>
																							<?php
																							if (!empty($row_data[res_bangsa])) {
																											foreach ($row_data[res_bangsa] as $val_bangsa) {
																															$sel_bangsa = $val_bangsa->id == $b_bangsa ? "selected=\"selected\"" : "";
?>
																															<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>

							<div class="w3-row">
											<div class="float-left">
															<button type="button" class="btn btn-primary" id="simpan" onclick="copyalamat()">Alamat Seperti Diatas</button>
											</div>
							</div>
							<div class="form-group">
											<label for="c_alamat">Alamat Tetap <span class="text-danger">*</span></label>
											<textarea name="c_alamat" id="c_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control"><?php //echo $alamat;?></textarea>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="c_poskod">Poskod <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_poskod" id="c_poskod" placeholder="Poskod" style="width:95%">
																			<input type="hidden" name="c_poskod_id" id="c_poskod_id" value="<?php //echo $poskod;?>">
																			<span id="c_poskod-error" style="color:red"></span>
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="c_bandar">Bandar <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_bandar" id="c_bandar" placeholder="Bandar">
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="c_negeri">Negeri <span class="text-danger">*</span></label>
																			<select class="form-control" name="c_negeri" id="c_negeri" style="width:95%">
																							<option value="">Pilih Negeri</option>
																							<?php
																							if (!empty($row_data[res_negeri])) {
																											foreach ($row_data[res_negeri] as $val_negeri) {
?>
																															<option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="c_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_pekerjaan" id="c_pekerjaan" placeholder="Pekerjaan" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-col s6">
															<div class="form-group">
																			<label for="c_pendapatan">Pendapatan (RM) <span class="text-danger">*</span></label>
																			<select class="form-control" name="c_pendapatan" id="c_pendapatan">
																							<option value="">Pilih Pendapatan</option>
																							<?php
																							if (!empty($row_data[res_pendapatan])) {
																											foreach ($row_data[res_pendapatan] as $val_negeri) {
?>
																															<option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->pendapatan; ?></option>
																															<?php
																											}
																							}
?>
																			</select>
															</div>
											</div>
							</div>
							<div class="w3-row">
											<div class="w3-half">
															<div class="form-group">
																			<label for="c_majikan">Majikan <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_majikan" id="c_majikan" placeholder="Majikan" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-quarter">
															<div class="form-group">
																			<label for="c_majikan">No Telefon Pejabat <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_no_tel_pejabat" id="c_no_tel_pejabat" placeholder="No Telefon Pejabat" value="<?php //echo $no_telefon;?>" style="width:95%">
															</div>
											</div>
											<div class="w3-quarter">
															<div class="form-group">
																			<label for="c_majikan">Samb <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="c_samb" id="c_samb" placeholder="Samb" value="<?php //echo $no_telefon;?>">
															</div>
											</div>
							</div>
							<div class="form-group">
											<label for="c_alamat_pejabat">Alamat Pejabat <span class="text-danger">*</span></label>
											<textarea name="c_alamat_pejabat" rows="3" cols="40" placeholder="Alamat Pejabat" class="form-control"><?php //echo $alamat;?></textarea>
							</div>
			</div>

			<div class="w3-container w3-light-gray" id="penjagacontainer" style="display:none">
				<div class="w3-row">
					<br/>
								<div class="w3-col s6">
												<div class="form-group">
																<label for="nama_penuh">Nama Penuh <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_nama_penuh" id="a_nama_penuh" placeholder="Nama Penuh" value="<?php //echo $nama_penuh;?>" style="width: 95%">
												</div>
								</div>
								<div class="w3-col s6">
												<div class="form-group">
																<label for="a_kategori_penjaga">Hubungan <span class="text-danger">*</span></label>
																<select class="form-control" name="a_hubungan" id="a_hubungan">
																				<option value="">Sila Pilih</option>
																				<?php
																				if (!empty($row_data[ref_hubungan])) {
																								foreach ($row_data[ref_hubungan] as $val_kwrg) {
																												$sel_kwrg = $val_kwrg->id == $a_hubungan ? "selected=\"selected\"" : "";
						?>
																												<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->hubungan; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label>Jenis Pengenalan <span class="text-danger">*</span></label>
																<div class="form-check">
																				<label class="form-check-label">
																								<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_a" value="Awam" checked="checked">
																								Awam
																				</label>&nbsp;&nbsp;
																				<label class="form-check-label">
																								<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_t" value="Tentera">
																								Tentera
																				</label>
																				<label class="form-check-label">
																								<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_p" value="Polis">
																								Polis
																				</label>
																</div>
												</div>
								</div>
								<div class="w3-col s6">
												<div class="form-group">
																<label id="no_mykad">No. MyKAD <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_mykad" id="a_mykad" placeholder="No MyKAD" value="<?php //echo $no_mykad; ?>">
																<span id="a_mykad-error" class="registration-error"></span>
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
																<select class="form-control" name="a_kewarganegaraan" id="a_kewarganegaraan" style="width: 95%">
																				<option value="">Pilih Kewarganegaraan</option>
																				<?php
																				if (!empty($row_data[res_kewarganegaraan])) {
																								foreach ($row_data[res_kewarganegaraan] as $val_kwrg) {
																												$sel_kwrg = $val_kwrg->id == $b_kewarganegaraan ? "selected=\"selected\"" : "";
						?>
																												<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
								<div class="w3-col s6">
												<div class="form-group">
																<label for="a_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
																<select class="form-control" name="a_kategori_penjaga" id="a_kategori_penjaga">
																				<option value="">Pilih Kategori Penjaga</option>
																				<?php
																				if (!empty($row_data[ref_kategori_penjaga])) {
																								foreach ($row_data[ref_kategori_penjaga] as $val_kwrg) {
																												$sel_kwrg = $val_kwrg->id == $b_kategori_penjaga ? "selected=\"selected\"" : "";
						?>
																												<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label for="no_telefon">No Telefon (cth: 0389008989) <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_no_tel" id="a_no_tel" placeholder="No Telefon" value="<?php //echo $no_telefon;?>" style="width: 95%">
												</div>
								</div>
								<div class="w3-col s6">
												<div class="form-group">
																<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_no_hp" id="a_no_hp" placeholder="No Telefon Bimbit" value="<?php //echo $no_hp;?>">
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label for="agama">Agama <span class="text-danger">*</span></label>
																<select class="form-control" name="a_agama" id="a_agama" style="width: 95%">
																				<option value="">Pilih agama</option>
																				<?php
																				if (!empty($row_data[res_agama])) {
																								foreach ($row_data[res_agama] as $val_agama) {
																												$sel_agama = $val_agama->id == $b_agama ? "selected=\"selected\"" : "";
						?>
																												<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
								<div class="w3-col s6">
												<div class="form-group">
																<label for="etnik">Etnik <span class="text-danger">*</span></label>
																<select class="form-control" name="a_etnik" id="a_etnik">
																				<option value="">Pilih Etnik</option>
																				<?php
																				if (!empty($row_data[res_etnik])) {
																								foreach ($row_data[res_etnik] as $val_etnik) {
																												$sel_etnik = $val_etnik->id == $b_etnik ? "selected=\"selected\"" : "";
						?>
																												<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
																<select class="form-control" name="a_bangsa" id="a_bangsa" style="width: 95%">
																				<option value="">Pilih Bangsa</option>
																				<?php
																				if (!empty($row_data[res_bangsa])) {
																								foreach ($row_data[res_bangsa] as $val_bangsa) {
																												$sel_bangsa = $val_bangsa->id == $b_bangsa ? "selected=\"selected\"" : "";
						?>
																												<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
				</div>
				<div class="form-group">
								<label for="a_alamat">Alamat Tetap <span class="text-danger">*</span></label>
								<textarea name="a_alamat" id="a_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control"><?php //echo $alamat;?></textarea>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label for="a_poskod">Poskod <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_poskod" id="a_poskod" placeholder="Poskod" style="width: 95%">
																<input type="hidden" name="a_poskod_id" id="a_poskod_id" value="<?php //echo $poskod;?>">
																<span id="a_poskod-error" style="color:red"></span>
												</div>
								</div>
								<div class="w3-col s6">
												<div class="form-group">
																<label for="a_bandar">Bandar <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_bandar" id="a_bandar" placeholder="Bandar">
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label for="a_negeri">Negeri <span class="text-danger">*</span></label>
																<select class="form-control" name="a_negeri" id="a_negeri" style="width: 95%">
																				<option value="">Pilih Negeri</option>
																				<?php
																				if (!empty(@$row_data[res_negeri])) {
																								foreach (@$row_data[res_negeri] as $val_negeri) {
						?>
																												<option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-col s6">
												<div class="form-group">
																<label for="a_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_pekerjaan" id="a_pekerjaan" placeholder="Pekerjaan" value="<?php //echo $no_telefon;?>" style="width: 95%">
												</div>
								</div>
								<div class="w3-col s6">
												<div class="form-group">
																<label for="a_pendapatan">Pendapatan (RM) <span class="text-danger">*</span></label>
																<select class="form-control" name="a_pendapatan" id="a_pendapatan">
																				<option value="">Pilih Pendapatan</option>
																				<?php
																				if (!empty($row_data[res_pendapatan])) {
																								foreach ($row_data[res_pendapatan] as $val_negeri) {
						?>
																												<option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->pendapatan; ?></option>
																												<?php
																								}
																				}
?>
																</select>
												</div>
								</div>
				</div>
				<div class="w3-row">
								<div class="w3-half">
												<div class="form-group">
																<label for="a_majikan">Majikan <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_majikan" id="a_majikan" placeholder="Majikan" value="<?php //echo $no_telefon;?>" style="width: 95%">
												</div>
								</div>
								<div class="w3-quarter">
												<div class="form-group">
																<label for="a_majikan">No Telefon Pejabat <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_no_tel_pejabat" id="a_no_tel_pejabat" placeholder="No Telefon Pejabat" value="<?php //echo $no_telefon;?>" style="width: 95%">
												</div>
								</div>
								<div class="w3-quarter">
												<div class="form-group">
																<label for="a_majikan">Samb <span class="text-danger">*</span></label>
																<input type="text" class="form-control" name="a_samb" id="a_samb" placeholder="Samb" value="<?php //echo $no_telefon;?>">
												</div>
								</div>
				</div>
				<div class="form-group">
								<label for="a_alamat_pejabat">Alamat Pejabat <span class="text-danger">*</span></label>
								<textarea name="a_alamat_pejabat" rows="3" cols="40" placeholder="Alamat Pejabat" class="form-control"><?php //echo $alamat;?></textarea>
				</div>
</div>

</div>

	<script>
    function copyalamat() {
        $("#c_alamat").val($("#b_alamat").val());
        $("#c_poskod").val($("#b_poskod").val());
        $("#c_poskod_id").val($("#b_poskod_id").val());
        $("#c_bandar").val($("#b_bandar").val());
        $("#c_negeri").val($("#b_negeri").val());
    }

				// ngisi field penjaga waris
    $("#a_poskod").blur(function () {
        var poskodKet = $("#a_poskod").val();
        $.ajax({
            dataType: 'json',
            data: {poskod_ket: poskodKet},
            url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
            type: "POST",
            success: function (data) {
															if (data.id_poskod > 0) {
																		$("#a_bandar").val(data.bandar);
																		$("#a_negeri").val(data.negeri);
																		$("#a_poskod_id").val(data.id_poskod);
																	}else{
																					$("#a_poskod-error").html("Poskod Tidak Ditemukan");
																						$("#a_poskod").val("");
																					$("#a_poskod").focus();
																	}
            }
        });
    });

    // ngisi field bandar dan negeri bapa
    $("#b_poskod").blur(function () {
        var poskodKet = $("#b_poskod").val();
        $.ajax({
            dataType: 'json',
            data: {poskod_ket: poskodKet},
            url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
            type: "POST",
            success: function (data) {
															if(data.id_poskod > 0) {
                $("#b_bandar").val(data.bandar);
                $("#b_negeri").val(data.negeri);
                $("#b_poskod_id").val(data.id_poskod);
															}else{
																					$("#b_poskod-error").html("Poskod Tidak Ditemukan");
																						$("#b_poskod").val("");
																					$("#b_poskod").focus();
															}
            }
        });
    });

    // ngisi field bandar dan negeri ibu
    $("#c_poskod").blur(function () {
        var poskodKet = $("#c_poskod").val();
        $.ajax({
            dataType: 'json',
            data: {poskod_ket: poskodKet},
            url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
            type: "POST",
            success: function (data) {
															if(data.id_poskod > 0) {
																		$("#c_bandar").val(data.bandar);
																		$("#c_negeri").val(data.negeri);
																		$("#c_poskod_id").val(data.id_poskod);
															}else{
																		$("#c_poskod-error").html("Poskod Tidak Ditemukan");
																		$("#c_poskod").val("");
																		$("#c_poskod").focus();
																	}

            }
        });
    });

    $("#b_jenis_pengenalan_a").click(function () {
        document.getElementById('no_mykad').innerHTML = 'No. MyKAD';
        $('#b_mykad').attr('placeholder', 'No. MyKAD');
    });
    $("#b_jenis_pengenalan_t").click(function () {
        document.getElementById('no_mykad').innerHTML = 'No. Tentera';
        $('#b_mykad').attr('placeholder', 'No. Tentera');
    });
    $("#b_jenis_pengenalan_p").click(function () {
        document.getElementById('no_mykad').innerHTML = 'No. Polis';
        $('#b_mykad').attr('placeholder', 'No. Polis');
    });

    $("#c_jenis_pengenalan_a").click(function () {
        document.getElementById('c_no_mykad').innerHTML = 'No. MyKAD';
        $('#c_mykad').attr('placeholder', 'No. MyKAD');
    });
    $("#c_jenis_pengenalan_t").click(function () {
        document.getElementById('c_no_mykad').innerHTML = 'No. Tentera';
        $('#c_mykad').attr('placeholder', 'No. Tentera');
    });
    $("#c_jenis_pengenalan_p").click(function () {
        document.getElementById('c_no_mykad').innerHTML = 'No. Polis';
        $('#c_mykad').attr('placeholder', 'No. Polis');
    });

    // perubahan maklumat
    $("#maklumat").change(function () {
        $("#ibubapacontainer").hide();
        $("#penjagacontainer").hide();
        if (this.value == 1) {
            $("#ibubapacontainer").show();
        } else if (this.value == 2) {
            $("#penjagacontainer").show();
        }
    });
</script>
